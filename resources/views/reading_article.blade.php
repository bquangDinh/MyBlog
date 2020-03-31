@extends('layouts.main_layout')

@section('title')
Reading
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/reading_article.css') }}">
@endsection

@section('main-content')
<input type="text" style="display: none" id="song-source" value="{{ URL::asset('sources/media/musics/Subwoofer_Lullaby.mp3') }}">
<div style="margin-top: 70px"></div>
<div class="reading-article-container container-fluid py-3">
    <div class="animated fadeInDown slow article-cover d-flex justify-content-center align-items-center">
        <img src="https://i.imgur.com/0Z1uT62.png" alt="">
    </div>
    <div class="row w-100 mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-12">
            <div class="music-container animated fadeInDown slow">
                <div class="music-name text-center pt-4" id="music-name">Coldplay - Yellow</div>
                <div class="music-controlable-panel">
                    <div class="control-panel d-flex justify-content-center align-items-center">
                        <button id="previous-song">
                            <i class="fas fa-backward"></i>
                        </button>
                        <label id="play-toggle" class="px-3">
                            <input type="checkbox">
                            <div>
                            </div>
                        </label>
                        <button id="next-song">
                            <i class="fas fa-forward"></i>
                        </button>
                    </div>
                    <div class="row mt-3 pb-4 no-gutters">
                        <div class="col-md-2 col-3">
                        <div class="d-flex justify-content-end align-items-center w-100">
                                <div id="volume-icon">
                                    <i class="fas fa-volume-up"></i>    
                                </div>
                                <div class="slider-container w-75 px-2" id="volume-slider">
                                    <input type="range" min="0" max="100">
                                    <div class="slider-outer">
                                        <div class="slider-inner" style="width: 80%">
                                            <div class="slider-point"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-9">
                            <div class="w-100 d-flex justify-content-center align-items-center">
                                <div id="current-song-time">0:00</div>
                                <div class="slider-container px-2" id="duration-slider">
                                    <input type="range" min="0" max="100">
                                    <div class="slider-outer">
                                        <div class="slider-inner" style="width: 80%">
                                            <div class="slider-point"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="song-duration" class="pl-2">1:30</div>
                            </div>
                        </div>
                        <div class="col-md-2 d-none">
                        </div>
                    </div>
                </div>
            </div>
            <div class="article-main-content w-100 animated fadeIn slow delay-1s mt-4">
                <div class="point-deep-shadow" style="top: 15px; left: 15px"></div>
                <div class="point-deep-shadow" style="top: 15px; right: 15px"></div>
                <div class="point-deep-shadow" style="bottom: 15px; right: 15px"></div>
                <div class="point-deep-shadow" style="bottom: 15px; left: 15px"></div>
                <div class="article-title text-center pt-5">
                    Making Minecraft Processing, how hard is it?
                </div>
                <div class="article-info text-center pb-5">
                    <span>June 20, 2020</span>
                    <span><b>Note</b></span>
                </div>
                <div class="article-content px-5 pb-5">
                In American schools, bullying is like the dark cousin to prom, student elections, or football practice: Maybe you weren’t involved, but you knew that someone, somewhere was. Five years ago, President Obama spoke against this inevitability at the White House Conference on Bullying Prevention. “With big ears and the name that I have, I wasn’t immune. I didn’t emerge unscathed,” he said. “But because it’s something that happens a lot, and it’s something that’s always been around, sometimes we’ve turned a blind eye to the problem.”

We know that we shouldn’t turn a blind eye: Research shows that bullying is corrosive to children’s mental health and well-being, with consequences ranging from trouble sleeping and skipping school to psychiatric problems, such as depression or psychosis, self-harm, and suicide.

But the damage doesn’t stop there. You can’t just close the door on these experiences, says Ellen Walser deLara, a family therapist and professor of social work at Syracuse University, who has interviewed more than 800 people age 18 to 65 about the lasting effects of bullying. Over the years, deLara has seen a distinctive pattern emerge in adults who were intensely bullied. In her new book, Bullying Scars, she introduces a name for the set of symptoms she often encounters: adult post-bullying syndrome, or APBS.

DeLara estimates that more than a third of the adults she’s spoken to who were bullied have this syndrome. She stresses that APBS is a description, not a diagnosis—she isn’t seeking to have APBS classified as a psychiatric disorder. “It needs considerably more research and other researchers to look at it to make sure that this is what we’re seeing,” deLara says.

Roughly 1 in 3 students in the United States are bullied at school (figures on cyberbullying are less certain, because it is newer than other forms of bullying and the technology kids use to carry it out is constantly in flux). This abuse can span exclusion, rumors, name-calling, or physical harm. Some victims are isolated loners while others are bedeviled by their own friends or social rivals.

Years after being mistreated, people with adult post-bullying syndrome commonly struggle with trust and self-esteem, and develop psychiatric problems, deLara’s research found. Some become people-pleasers, or rely on food, alcohol, or drugs to cope.

In some respects, APBS is similar to post-traumatic stress disorder, or PTSD, in which people who have had terrifying experiences develop an impaired fight-or-flight response. Both APBS and PTSD can lead to lasting anger or anxiety, substance abuse, battered self-esteem, and relationship problems. One difference, though, is that people with APBS seem less prone to sudden flares of rage.

“Those with PTSD have internalized their trauma such that it has affected their nervous system,” deLara says. “People with PTSD react immediately because their triggers are basically telling them they need to protect themselves against harm.” Those with APBS seem to have a longer fuse; the damage comes not in an outsized reaction but instead because they ruminate on what happened. 
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/smooth-scrollbar.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/date.js') }}"></script>
<script src="{{ URL::asset('js/reading_article.js') }}"></script>
@endsection