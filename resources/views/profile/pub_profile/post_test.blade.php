<div class="work" id="work">
    <div class="row">

        <div class="col col-lg-12">
            <?php
            foreach ($posts as $post) { ?>
            <div class="card mb-3">


                <div class="card-body">
                    <div class="head1 text-center">
                        {{ $post->title }}<br>
                    </div>
                    <div class="text-con text-center">
                        {{ $post->des }}<br>
                    </div>

                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
