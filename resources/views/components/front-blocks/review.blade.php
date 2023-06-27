<div class="row align-items-center">
    <div class="col-lg-6 order-lg-2">
        <div>
            <figure><img src="{{ asset($block->content?->image ?? '') }}" alt=""></figure>
            <div class="row counter counter-s position-absolute" style="top: 10%; left: 25%;">
                <div class="col-md-10 text-center">
                    <div class="box bg-white shadow">
                        <h3><span class="value">{{ $block->content?->number ?? '' }}</span>+</h3>
                        <p>{{ $block->content?->title ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space20 d-md-none"></div>
    <div class="space50 d-none d-md-block d-lg-none"></div>
    <div class="col-lg-6 pr-60 pr-md-15">
        <div class="basic-slider owl-carousel gap-small text-center owl-loaded owl-drag" data-margin="30">

            <div class="owl-stage-outer owl-height" style="height: 306px;">
                <div class="owl-stage"
                     style="transform: translate3d(-900px, 0px, 0px); transition: all 0s ease 0s; width: 3150px;">
                    <div class="owl-item" style="width: 420px; margin-right: 30px;">
                        <div class="item">
                            <blockquote class="icon larger">
                                <p>{{ $block->content?->text ?? '' }}</p>
                                <div class="blockquote-details justify-content-center">
                                    <div class="img-blob blob1"><img src="style/images/art/t2.jpg" alt=""></div>
                                    <div class="info">
                                        <h6 class="mb-0">{{ $block->content?->author ?? '' }}</h6>
                                        <span class="meta mb-0">{{ $block->content?->position ?? '' }}</span>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-nav disabled">
                <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
                <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
            </div>
            <div class="owl-dots">
                <button role="button" class="owl-dot active"><span></span></button>
                <button role="button" class="owl-dot"><span></span></button>
                <button role="button" class="owl-dot"><span></span></button>
            </div>
        </div>

    </div>

</div>

<div class="owl-nav disabled">
{{--        <button type="button" role="presentation" class="owl-prev">--}}
{{--            <span aria-label="Previous">‹</span>--}}
{{--        </button>--}}
{{--        <button type="button" role="presentation" class="owl-next">--}}
{{--            <span aria-label="Next">›</span>--}}
{{--        </button>--}}
    </div>
    <div class="owl-dots">
{{--        <button role="button" class="owl-dot active"><span></span></button>--}}
{{--        <button role="button" class="owl-dot"><span></span></button>--}}
{{--        <button role="button" class="owl-dot"><span></span></button>--}}
    </div>
</div>

</div>

</div>
