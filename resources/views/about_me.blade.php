@extends('layouts.main_layout')

@section('title')
I'm Dinh
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/about_me.css') }}">
@endsection

@section('main-content')
<div class="me-container">
    <div class="me-card-container d-flex justify-content-center align-items-center">
        <div class="me-card">
            <div class="card-inner">
                <div class="card-front d-flex justify-content-around align-items-center w-100 h-100">
                    <div class="side text-right ml-2"><</div>
                    <div class="center text-center">
                        <span>@lang('messages.author_name')</span>
                        <span>buiquangdinh1751@gmail.com</span>
                    </div>
                    <div class="side text-left mr-2">/></div>
                </div>
                <div class="card-back d-flex justify-content-around align-items-center w-100 h-100">
                    <div class="px-2 py-2">
                        <!-- You HERE -->
                        <div>@lang('messages.hello_there')</div>
                        <div>@lang('messages.tk_am_crd_back')</div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-1 d-none d-lg-block"></div>
        <div class="col-md-10 col-12">
            <div class="message-container ml-3 mr-3">
                <div class="point-deep-shadow" style="top: 15px; left: 15px"></div>
                <div class="point-deep-shadow" style="top: 15px; right: 15px"></div>
                <div class="point-deep-shadow" style="bottom: 15px; right: 15px"></div>
                <div class="point-deep-shadow" style="bottom: 15px; left: 15px"></div>
                <div class="vietnamese-version language-container">
                    <div class="message-title text-center mt-5">@lang('messages.about_me')</div>
                    <div class="message-content-container mt-3 py-5 px-5">
                    <p>
                        Chào mọi người, tên mình là Đính, tên đầy đủ là Bùi Quang Đính. Lý do có cái blog ni là vì mình muốn viết nhiều hơn về những gì
                        mình trải nghiệm. Những dự án mình đang làm, những suy nghĩ mà mình muốn nói ra từ lâu. Cũng là vì những giới hạn của Facebook khi viết note.
                        Note trên Facebook cũng ok nhưng mà chừng đó là chưa đủ. Kiểu khá là túng thiếu công cụ để trình bày, nên là mình làm ra cái blog này để thay đổi mọi thứ theo
                        ý của mình chứ không theo Facebook. Một vài điều về mình á? Mình thích chơi game, nhất là những game cốt truyện và có chiều sâu, và đồ họa phải ok một chút. Mình sẵn sàng mua game
                        để chơi nếu game đó thực sự hay.  Về nhạc thì mình có nói phía dưới, mình thích mấy bản nhạc cũ. Vì hồi đó ba mình toàn bật nhạc thập niên 80 nên nghe chặp cũng quen. Nhạc pop cũng có nghe nhé :)) Sách thì cũng có thích, nhưng mình không phải là mọt sách. Kiểu là chỉ đọc sách khi nào có hứng thì mới đọc chứ không
                        một tuần 5-6 cuốn như mọt sách (chủ yếu dành thời gian chơi game :v). Lúc nhỏ, cỡ lớp một lớp hai, mình không thích sách lắm với lại ba mẹ cũng không ép đọc.
                        Rồi đến một ngày ba chở mình tới tiệm sách cũ trên lề đường Hai Ba Trưng đối diện cao đăng y dược, cái bất ngờ đầu tiên là sách ở đây rẻ kinh khủng.
                        Nó chỉ có 1 nghìn đến 2 nghìn một cuốn à, mà thời đó tiền mua truyện Doraemon làm gì đó, nên là ngày mô cũng ra ngoài đó mua truyện, dần chuyển qua mua sách đến bây giờ.
                        Tính mình thì khá ít nói, nhộn nhộn trên mạng thế thôi chứ ngoài đời im re. Đó là không phải mình không muốn nói chuyện mà là chẳng biết tìm chủ đề gì để nói, nói ra thì sợ bị lố, bị nhìn nhận nên
                        đâm ra ít nói. Nhưng mà nếu người đối diện nói về chủ đề mình thích thì nói nhiều vô kể :v. Về đồ ăn thì mình thích đồ ba mình nấu, ba nấu là số một, đồ ngoài 
                        ăn cho vui chứ không ăn nhiều. Còn về cái mình thích nhất là công nghệ. Lý do thì cũng từ game là ra, từ nhỏ khi mô cũng nghĩ
                        học coding này nọ là ra làm game được nên thích. Nhưng sau này, kinh qua nhiều cuộc thi, gặp gỡ nhiều người, có những người bắt đầu coding từ nhỏ, thì đâm ra yêu cái này.
                        Mình thích cái cách mà công nghệ ảnh hưởng lên mọi mặt của cuộc sống bây giờ, giúp đỡ và làm mọi thứ tốt hơn. 100 năm trước, nói chuyện với người này người kia cách nhau nửa vòng Trái Đất là điều viễn vông, 
                        thì bây giờ họ có thể nhìn thấy mặt nhau, nói chuyện với nhau. Từ những bản nhạc lâu ơi là lâu mà mình vẫn có thể nghe trên Youtube, đến bất cứ thứ gì mình muốn biết ở 
                        trên Google. Nói thế chứ mình không phải là coder thần thánh đồ này nọ gì đâu nhé, mình bắt đầu lập trình cũng trễ hơn người ta nhiều, giỏi thì cũng chả có gì để đem ra khoe :)). 
                        Mình chỉ không thích cách mà người ta thần thánh hóa coding lên thành một cái chi đó cool ngầu, ghê gớm, những người trùm mũ kín đầu rồi bắt đầu gõ gõ, hack đồ này nọ.
                        Nó cũng giống như bất cứ cái gì trên đời thôi. Nên nhiều khi ai đó nói chuyện với mình kiểu coding là thứ gì đó ghê gớm lắm thì mình không thích. Về dự án thì mình có làm một vài dự án, phần nhỏ là làm cho mấy cuộc thi mình thi, 
                        phần lớn là làm cho bản thân, thử sức cái chi đó thú vị hơn để học hỏi nhiều hơn. Dự án mô mình thích thì mình mới làm được chứ không thích thì khó theo với hắn lắm. 
                        Đi thi có thể kể đến như mình có viết cái game thực tế ảo nhỏ nhỏ để cảnh báo mọi người về tai nạn giao thông, rồi viết cái phần mềm cùng với team của mình về quản lý bệnh
                        nhãn khoa, rồi bắt đầu làm web cho bên giáo dục, kiến trúc. Dự án cá nhân thì có viết lại Minecraft, làm tool nhận diện khuôn mặt, viết bộ phần mềm quản lý cuộc thi cho CPO (format giống Đường Lên Đỉnh Olympia).
                        Chỉ có vài ba cái dám đăng lên thế thôi. 
                        </p>
                        <p>
                        Ok thế thôi. Mong với chừng đó bạn có thể hiểu về mình, nếu có bất kỳ thắc mắc gì thì mình có cái card nhỏ nhỏ ở trên đó. Mọi người liên lạc qua đó. 
                        </p>
                        <p>
                        Ok chào mọi người, chúc mọi người một ngày tốt lành.
                        </p>
                        <p class="text-right">
                        Đính.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div classs="col-md-1 d-none d-lg-block"></div>
    </div>

    <div class="title-container d-flex justify-content-center align-items-center mt-5">
        <div>@lang('messages.favor_bands')</div>
    </div>

    <div class="favor-band mt-5">
        <!-- Ngot Band -->
        <div class="row">
            <div class="col-md-6 col-12">
                <img src="{{ URL::asset('sources/media/images/private/ngot_band.png') }}" alt="ngot band cover" class="band-cover">
            </div>
            <div class="col-md-6 col-12">
                <div class="text-center band-name">
                    @lang('messages.ngot_band_name')
                </div>
                <div class="band-message px-5 py-2">
                @if(\App::getLocale() == 'vi-VN')
                    Bài hát đầu tiên mà mình nghe của Ngọt là "Em dạo này". Lúc đó thực ra không có ý định nghe bài đó
                    mà là từ gợi ý của Youtube. Mình thì đang làm gì đấy xong nghe giai điệu cũng lạ lạ nên chuyển tab qua Youtube xem là bài gì thì thấy
                    Ngọt :D. Lý do mình thích band nhạc này là vì nó lạ (chất giọng của ông Thắng đúng là "ngọt" thật ) và quan trọng nhất là nó hợp với mình, thế thôi :)). Rồi sau đó
                    thử nghe mấy bài khác thì cũng hay phết :v. À mà tất nhiên không phải bài nào mình cũng thích đâu nhé.
                @else
                    The first song I heard from Ngot was "Em dao nay". It was from Youtube's suggestion and I had no idea about the song. It just happened.
                    Then I was like "Wao, this song is so nice". The thing made me like this song that is Vu Dinh Trong Thang's voice. His voice is so good and unique.
                    It's like chewing a sweet candy in your mouth. By the way, I like this band that doesn't mean I like every song of this band.
                @endif
                </div>
            </div>
        </div>
    </div>

    <div class="favor-band mt-5">
        <!-- Chillies Band -->
        <div class="row">
            <div class="col-md-6 col-12">
                <img src="{{ URL::asset('sources/media/images/private/chillies-band.png') }}" alt="chillies band cover" class="band-cover">
            </div>
            <div class="col-md-6 col-12">
                <div class="text-center band-name">
                    Chillies
                </div>
                <div class="band-message px-5 py-2">
                @if(\App::getLocale() == 'vi-VN')
                    Bài đầu tiên mình nghe của Chillies là "Và thế là hết". Lúc đầu nghe thì không có gì thấm lắm nhưng
                    mà càng nghe mình lại càng thích. Xong tương tự như Ngọt band, mình cũng nghe thử những bài khác của nhóm. 
                    Đánh giá cá nhân của mình là mấy bài của Chillies cảm giác như có thể đưa vào làm nhạc nền của phim thì hay vl :D.
                    Mình nhìn ảnh của nhóm mới nhận ra ông hát chính từ một video mình đã coi từ khá lâu trước đó. Nó là ổng với ông anh khát
                    hát cover bài "Cho tôi lang thang" ở OpenShow. Giống như Ngọt thì không phải bài nào mình cũng thích, có mấy bài dù cố nghe lắm á
                    nhưng mà không nghe được :D.
                @else
                    "Va the la het" was the first song I heard. This song was being on trending that time, people felt in love with this song. 
                    So I was, I heard this song a hundred times and it's still good though. This band currently has no many song, they publish a song each month.
                    You should heard "Who" of this band, one day. 
                @endif
                </div>
            </div>
        </div>
    </div>

    <div class="title-container d-flex justify-content-center align-items-center mt-5">
        <div>@lang('messages.favor_games')</div>
    </div>
    
    <div class="me-game-container mt-5" >
        <div class="me-game w-100">
            <img src="{{ URL::asset('sources/media/images/private/astroneer-landscape.png') }}" alt="">
            <div class="me-game-name" id="astroneer">
                <div>
                    @if(\App::getLocale() == 'vi-VN')
                    Tui yêu game ni
                    @else
                    Best game ever :D
                    @endif
                </div>
                <div>
                    ASTRONEER
                </div>
                <div>
                    @if(\App::getLocale() == 'vi-VN')
                    Và hết rồi. :))
                    @else
                    The end :))
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/smooth-scrollbar.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/vendors/particles.min.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/about_me.js') }}"></script>
@endsection