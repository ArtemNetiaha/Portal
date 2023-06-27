<div class="row align-items-center">
    <div class="col-lg-6 order-lg-2 text-center">
        <figure><img src="#" srcset="{{ asset($block->content->image ?? '') }}" alt=""></figure>
    </div>
    <!--/column -->
    <div class="space20 d-md-none"></div>
    <div class="space50 d-none d-md-block d-lg-none"></div>
    <div class="col-lg-6 pr-60 pr-md-15">
        <h2 class="title-bg bg-default color-default">{{ $block->content->title ?? '' }}</h2>
        <div class="space10"></div>
        <h3 class="display-3">{{ $block->content->span ?? '' }}</h3>
        <div class="space20"></div>
        <div id="accordion-1" class="accordion-wrapper simple">
            @foreach($block->blocks as $subBlock)
            
            <div class="card">
                <div class="card-header" id="accordion-heading-1-{{ $subBlock->id }}">
                    <h5>
                        <button data-toggle="collapse" data-target="#accordion-collapse-1-{{ $subBlock->id }}"
                                aria-expanded="true" aria-controls="accordion-collapse-1-{{ $subBlock->id }}" class="">
                            {{ $subBlock->content->question ?? '' }}</button>
                    </h5>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-1-{{ $subBlock->id }}"
                     class="collapse @if($loop->index == 0) show @endif"
                     aria-labelledby="accordion-heading-1-{{ $subBlock->id }}" data-parent="#accordion-1" style="">
                    <div class="card-body">
                        <p>{{ $subBlock->content->answer ?? '' }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
            </div>
            @endforeach
        </div>
        <!-- /.accordion-wrapper -->
    </div>
    <!--/column -->
</div>
