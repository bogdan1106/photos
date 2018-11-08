<?php

use yii\helpers\Html;
use yii\helpers\Url;


// function subscribe1($yo,$man)
//{
//    $redis = Yii::$app->redis;
//    $redis->sadd("userrr:{$yo}:subscriptions",$man);
//    $redis->sadd("userrr:{$man}:followers",$yo);
//}
//
//    subscribe1(4,12);
//
//subscribe1(6,12);
?>





<?php



?>


<h2><?=Html::encode($user->username); ?></h2>
<h3><?=Html::encode($user->about); ?></h3>







    <?php if ($currentUser && $currentUser->id != $user->id) : ?>

        <?php if ( !$currentUser->checkSubscribe($user)) : ?>

            <a href="<?= Url::to(['/user/profile/subscribe', 'id' => $id] ) ?>"><button >Подписаться</button></a>

        <?php else :  ?>
            <a href="<?= Url::to(['/user/profile/desubscribe', 'id' => $id] ) ?>"><button >Отписаться</button></a>
        <?php endif ?>

    <?php endif ?>

    <br><br>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
        Подписан: <?= $user->countSubscriptions() ?>
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
        Подписчики: <?= $user->countFollowers() ?>
    </button>






    <!--    Совместные подписчики-->
<?php if ($currentUser) : ?>

    <?php
    $mutuals = $currentUser->getMutualSubscriptionsTo($user);
        if ($mutuals) : ?>
            <h2>Совместные друзья:  </h2>
          <?php  foreach ($mutuals as $mutual) : ?>

                <a href="<?= Url::to("/profile/{$mutual['id']}") ?>"><?=$mutual['username']?></a> <br>
            <?php endforeach ?>
        <?php endif ?>
<?php endif ?>



<!-- Modal1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><?=$user->username ?> подписан на:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $subscriptions = $user->getSubscriptions();
                foreach ($subscriptions as $subscription) : ?>
                    <h3><a href="<?= Url::to("/profile/{$subscription['id']}") ?>"><?=$subscription['username'] ?></a></h3>
                <?php endforeach ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> Подписчики <?=$user->username ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $followers = $user->getFollowers();
                foreach ($followers as $follower) : ?>
                    <h3><a href="<?= Url::to("/profile/{$follower['id']}") ?>"><?=$follower['username'] ?></a></h3>
                <?php endforeach ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>