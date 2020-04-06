var Player = function(playlist){
    this.playlist = playlist;
    this.index = 0;
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
                },
                onload: function(){

                },
                onend: function(){
                    //self.skip('next');
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

        self.index = index;
    },
    pause: function(){
        var self = this;

        var sound = self.playlist[self.index].howl;

        sound.pause();
    },
    stop: function(){
        var self = this;
        
        var sound = self.playlist[self.index].howl;

        sound.stop();
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

        self.play(index);
    },
    volume: function(val){
        var self = this;

        //Update the global volume
        Howler.volume(val);
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

var player = null;

var currentTrackCheckBox = null;

function initTrackList(){
    var tracklist = [];

    $(".track-container").each(function(index){
        let source = $(this).data("track-source");
        let title = $(this).data("track-title");
        let howl = null;
        let track = {
            title: title,
            file: source,
            howl: howl
        }
        tracklist.push(track);

        //init play toggle event
        let toggle = $(this).find(".play-track-toggle > input").first();
        
        $(toggle).change(function(e){
            if(this.checked){
                //play this track
                if(currentTrackCheckBox == null) currentTrackCheckBox = this;
                else if(!$(currentTrackCheckBox).is(this)){
                    $(currentTrackCheckBox).prop("checked", false).change();
                    currentTrackCheckBox = this;
                }
                if(player) player.play(index);    
            }else{
                if(player) player.stop();
            }
        });
    });

    player = new Player(tracklist);
}

$(document).ready(function(e){
    $(".music-whole-container").attachDragger();
    initTrackList();
});