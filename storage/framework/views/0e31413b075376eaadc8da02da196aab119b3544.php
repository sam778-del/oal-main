<div class="favorite-list-item">
    <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m" 
        style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
    </div>
    <p><?php echo e(strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name); ?></p>
</div><?php /**PATH /var/www/html/olympus-asset.com/public_html/vendor/munafio/chatify/src/../views/layouts/favorite.blade.php ENDPATH**/ ?>