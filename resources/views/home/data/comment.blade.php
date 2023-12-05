@foreach($comment as $com)
<li class="comment__content-item">
    <div>
        <img src="https://plus.unsplash.com/premium_photo-1684783848349-fe1d51ab831b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxMnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
            alt="" />
    </div>
    <article class="comment__content-item-text">
        <h2 class="text-capitalize">{{$com->name}}</h2>
        <div>
            <?php
                $rating = $com->rating;
                $subrating = 5-$rating;
                for($i = 0;$i<$rating;$i++){
                    echo '<i class="fa-solid fa-star"></i>';
                }
                for($i = 0;$i<$subrating;$i++){
                    echo '<i class="fa-regular fa-star" style="color: #ffd43b;"></i>';
                }
            ?>
        </div>
        <p>
            {{$com->comment}}
        </p>
        <small>
            <?php
            $created_at = $com->created_at;
            $timestamp = strtotime($created_at);
            $formatted_date = date("d/m/Y", $timestamp);
            echo $formatted_date;
            ?>
        </small>
    </article>
</li>
@endforeach
<div class="pagination">
    <ul class="pagination">
        {{ $comment->links() }}
    </ul>
</div>