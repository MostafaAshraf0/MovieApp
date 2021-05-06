<div class="mt-8">
    <a href="<?=route('tv.show',$tvshow['id'])?>">
        <img src="<?=$tvshow['poster_path']?>" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="<?=route('tv.show',$tvshow['id'])?>" class="text-lg mt-2 " ><?=$tvshow['name']?></a>
        <div class="flex items center text-gray-400 text-sm mt-1">
            <svg height="21px" style="background:gray" version="1.1" viewBox="0 0 20 21" width="20px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Core" transform="translate(-296.000000, -422.000000)"><g id="star" transform="translate(296.000000, 422.500000)"><path d="M10,15.273 L16.18,19 L14.545,11.971 L20,7.244 L12.809,6.627 L10,0 L7.191,6.627 L0,7.244 L5.455,11.971 L3.82,19 L10,15.273 Z" id="Shape"/></g></g></g></svg>
            <samp class="mr-1"><?=$tvshow['vote_average'] ?></samp>
            <samp class="mx-2">|</samp>
            <span><?=($tvshow['first_air_date'])?></span>
        </div>
        <div class="text-sm" style="color: gray">
            <?=$tvshow['genres']?>
        </div>
    </div>
</div> 
 