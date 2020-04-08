/*Init Scrollbar*/
var scrollbar = window.Scrollbar;
var s = scrollbar.init(document.body,
    {
        damping: 0.08,
        continuousScrolling: true,
        alwaysShowTracks: false
    }
);

var CustomSlider = function(){
    this.init = false;
    this.percentage = 0;
    this.sliderContainer = null;
    this.sliderOuter = null;
    this.sliderProgressBar = null;
};

CustomSlider.prototype = {
    initialize: function(container,setPercentage){
        var that = this;
        if(that.init == false){
            that.sliderContainer = container;
            that.sliderOuter = $(that.sliderContainer).find(".slider-outer").first();
            that.sliderProgressBar = $(that.sliderContainer).find(".slider-inner").first();
            
            var initializeSlider = function(){
                var drag = false;
                if(setPercentage !== "undefined"){
                    that.updateSlider(-999,setPercentage);
                }
    
                $(that.sliderOuter).on("mousedown",function(e){
                    drag = true;
                    that.updateSlider(e.clientX);
                    $(that.sliderContainer).trigger("slider:update",[that.percentage]);
                });
    
                $(document).on("mousemove",function(e){
                    if(drag){
                        that.updateSlider(e.clientX);
                        $(that.sliderContainer).trigger("slider:update",[that.percentage]);
                    }
                });
    
                $(document).on("mouseup",function(e){
                    drag = false;
                });
            }
    
            initializeSlider();
            that.init = true;
        }else{
            console.error("This module is already initialized");
        }
    },
    updateSlider: function(x, percentAmount){
        var that = this;

        if(percentAmount){
            that.percentage = percentAmount * 100;
        }else{
            var position = x - $(that.sliderOuter).offset().left;
            that.percentage = 100 * (position / $(that.sliderOuter).width());
        }

        if(that.percentage > 100){
            that.percentage = 100;
        }

        if(that.percentage < 0){
            that.percentage = 0;
        }

        $(that.sliderProgressBar).css("width",that.percentage + "%");
    }
}

var volumeSlider = new CustomSlider;
volumeSlider.initialize($("#volume-slider"), 100);

var durationSlider = new CustomSlider;
durationSlider.initialize($("#duration-slider"), 0);

/*Init music tab*/
/*https://github.com/goldfire/howler.js/blob/master/examples/player/player.js*/
var songTitle = $("#music-name");
var songDuration = $("#song-duration");
var songTimer = $("#current-song-time");

var Player = function(playlist){
    this.playlist = playlist;
    this.index = 0;

    //display the first song in the list
    $(songTitle).text(playlist[0].title);
}

Player.prototype = {
    play: function(index){
        var self = this;
        var sound;
        index = typeof index === 'number' ? index : self.index;
        var data = self.playlist[index];
        if(data.howl){
            sound = data.howl;
        }else{
            sound = data.howl = new Howl({
                src: [data.file],
                onplay: function(){
                    requestAnimationFrame(self.step.bind(self));
                    $(songDuration).text(self.formatTime(Math.round(sound.duration())));
                },
                onload: function(){
                    $(songDuration).text(self.formatTime(Math.round(sound.duration())));
                },
                onend: function(){
                    self.skip('next');
                },
                onpause: function(){

                },
                onstop: function(){

                },
                onseek: function(){
                    requestAnimationFrame(self.step.bind(self));
                }
            });
        }

        var id = sound.play();

        //fade in the track
        sound.fade(0, sound.volume(), 1000, id);
        
        $(songTitle).text(data.title);

        self.index = index;
    },
    pause: function(){
        var self = this;

        var sound = self.playlist[self.index].howl;

        sound.pause();
    },
    skip: function(direction){
        var self = this;
        var index = 0;
        if(direction === 'prev'){
            index = self.index - 1;
            if(index < 0){
                index = self.playlist.length - 1;
            }
        }else{
            index = self.index + 1;
            if(index >= self.playlist.length) index = 0;
        }

        self.skipTo(index);
    },
    skipTo: function(index){
        var self = this;
        
        //stop the current track
        if(self.playlist[self.index].howl){
            self.playlist[self.index].howl.stop();
        }

        //reset progress
        durationSlider.updateSlider(-999, 0);

        self.play(index);
    },
    volume: function(val){
        var self = this;

        //Update the global volume
        Howler.volume(val);

        //update on volume slider
        volumeSlider.updateSlider(-999,val);
    },
    seek: function(per){
        var self = this;

        var sound = self.playlist[self.index].howl;

        if(sound.playing()){
            sound.seek(sound.duration() * per);
        }
    },
    step: function(){
        var self = this;

        var sound = self.playlist[self.index].howl;

        var seek = sound.seek() || 0;
        $(songTimer).text(self.formatTime(Math.round(seek)));
        //console.log((((seek / sound.duration())) || 0));
        //set song slider
        durationSlider.updateSlider(-99, (((seek / sound.duration())) || 0));

        if(sound.playing()){
            requestAnimationFrame(self.step.bind(self));
        }
    },
    formatTime: function(secs){
        var minutes = Math.floor(secs / 60) || 0;
        var seconds = (secs - minutes * 60) || 0;
        return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    }
}



var player = new Player([
    {
        title: 'Subwoofer Lullaby',
        file: 'http://127.0.0.1:8000/sources/media/musics/Subwoofer_Lullaby.mp3',
        howl: null
    },
    {
        title: 'Key',
        file: 'http://127.0.0.1:8000/sources/media/musics/Key.mp3',
        howl: null
    }
]);

$("#volume-slider").on("slider:update",function(e,percentage){
    player.volume(percentage / 100);
});

$("#duration-slider").on("slider:update",function(e,percentage){
    player.seek(percentage / 100);
});

$(document).ready(function(){
    $("#play-toggle > input").change(function(){
        if(this.checked){
            if(player) player.pause(); 
            $("#duration-slider").addClass("stop");
        }else{
            if(player) player.play();
            $("#duration-slider").removeClass("stop");
        }
    });

    $("#previous-song").on('click', function(e){
        if(player) player.skip("prev");
    });

    $("#next-song").on('click', function(e){
        if(player) player.skip('next');
    });

    var playlist = [];

    $(".track-source").each(function(index){
        let title = $(this).data("track-title");
        let source = $(this).val();
        playlist.push({
            title: title,
            file: source,
            howl: null
        });
    });

    if(playlist.length > 0) player = new Player(playlist);

    player.play(0);
});