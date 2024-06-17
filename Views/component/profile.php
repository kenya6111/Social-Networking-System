<?php 

$dummyposts=[
    [
        "id" => 1,
        "user"=> "tnk@engineer",
        "content"=> "人を笑わせることを志してきました。たくさんの人が自分の事で笑えなくなり、ただただ困惑し、悔しく悲しいです。。。。世間に真実が伝わり、一日も早く、お笑いがしたいです。",
        "likes"=> 23,
        "comments"=> [
            [
                "user"=> "mng_nq",
                "comment"=> "おめでとう！次も頑張って！"
            ]
        ],
        "image"=> "https://example.com/path/to/image.jpg"
    ],
    [
        "id" => 2,
        "user"=> "tnk@engineer",
        "content"=> "配信遅れて申し訳ございません.今日は山根です。重ねて申し訳ございません",
        "likes"=> 23,
        "comments"=> [
            [
                "user"=> "mng_nq",
                "comment"=> "おめでとう！次も頑張って！"
            ]
        ],
        "image"=> "https://example.com/path/to/image.jpg"
    ],
    [
        "id" => 3,
        "user"=> "tnk@engineer",
        "content"=> "今日は素晴らしい一日でした！最近のプロジェクトが無事に完了し、チーム全体でお祝いです。次のチャレンジに向けて、これからも頑張ります。",
        "likes"=> 23,
        "comments"=> [
            [
                "user"=> "mng_nq",
                "comment"=> "おめでとう！次も頑張って！"
            ]
        ],
        "image"=> "https://example.com/path/to/image.jpg"
    ],
    [
        "id" => 4,
        "user"=> "tnk@engineer",
        "content"=> "基本情報技術者試験、見事合格〜！年末年始？そんなの関係ねぇ！！年末年始返上が実を結びました",
        "likes"=> 23,
        "comments"=> [
            [
                "user"=> "mng_nq",
                "comment"=> "おめでとう！次も頑張って！"
            ]
        ],
        "image"=> "https://example.com/path/to/image.jpg"
    ],
    [
        "id" => 5,
        "user"=> "tnk@engineer",
        "content"=> "人を笑わせることを志してきました。たくさんの人が自分の事で笑えなくなり、ただただ困惑し、悔しく悲しいです。。。。世間に真実が伝わり、一日も早く、お笑いがしたいです。",
        "likes"=> 23,
        "comments"=> [
            [
                "user"=> "mng_nq",
                "comment"=> "おめでとう！次も頑張って！"
            ]
        ],
        "image"=> "https://example.com/path/to/image.jpg"
    ],
]
?>
<div class="row d-flex w-100">
    <div class="col-2">
    </div>
    <div class="col-8  d-flex flex-column justify-content-center border ">
        <!-- トレンドorフォロワー-->
        <div class="btn-group border-bottom" role="group" aria-label="Basic example">
            <a href="/homepage">
                <span class="material-symbols-outlined fs-2">arrow_back</span>
            </a>
            <div class="pt-1"><?= htmlspecialchars($user['username']); ?></div>
        </div>
        <div class="d-flex justify-content-start">
            <div class="profile-container rounded-circle overflow-hidden">
                <?php if ($user['profile_image'] != null ):?>
                    <img src=" <?= "/uploads/".$user['profile_image'] ?>" class="img-fluid" alt="">
                <?php else: ?>
                    <span class="material-symbols-outlined mt-4 fs-1">account_circle</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <h4 class="mb-0"><?= htmlspecialchars($user['username']); ?></h4>
            <input type="hidden" id="csrf_token" name="csrf_token" value="<?= Helpers\CrossSiteForgeryProtection::getToken(); ?>">
            <?php if ($user['id'] == $loginUserId):?>
                <div class="ms-auto">
                    <button id="edit-button" class="btn btn-primary ms-auto rounded-pill" data-bs-toggle="modal" data-bs-target="#editProfileModal">プロフィールを編集する</button>
                </div>
            <?php else: ?>
                <div class="ms-auto">
                    <input type="hidden" id="hidden-input" value="<?= htmlspecialchars($user['id']); ?>">
                    <button id="follow-btn" class="btn btn-primary ms-auto rounded-pill">フォローする</button>
                    <button id="un-follow-btn" class="btn btn-light btn-outline-primary ms-auto rounded-pill" style="display:none">フォロー中</button>
                </div>
            <?php endif; ?>
        </div>
        
        <div>
            <p>@ngh_nq</p>
        </div>
        <div class="container my-5">
            <div class="row fs-5">
                <div class="col-2">
                    <?= htmlspecialchars($followNum);?>
                    <a href="/followList?user_id=<?= htmlspecialchars($user['id']);?>" style="text-decoration:none; color: #000000;">follow</a>
                </div>
                <div class="col-2">
                    <?= htmlspecialchars($followerNum);?>
                    <a href="/followList?user_id=<?= htmlspecialchars($user['id']);?>" style="text-decoration:none;  color: #000000;">follower</a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                 <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse fs-5" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-around w-100">
                        <li class="nav-item" id="post-tab">
                            <a class="nav-link active text-dark" aria-current="page" href="#" data-target="#homeContent">post</a>
                        </li>
                        <li class="nav-item" id="reply-tab">
                            <a class="nav-link text-dark" href="#" data-target="#linkContent">reply</a>
                        </li>
                        <li class="nav-item" id="media-tab">
                            <a class="nav-link text-dark" href="#" data-target="#disabledContent">media</a>
                        </li>
                        <li class="nav-item" id="like-tab">
                            <a class="nav-link text-dark" href="#" data-target="#disabledContent">like</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="post-content">
                <!-- Dynamic content for Trend should be loaded here -->
                <ul id ="list-group" class="list-group list-unstyled">
                    <?php foreach ($posts as $post): ?>
                        <li class=" post border-top pt-2 pb-2">
                            <div class="d-flex justify-content-start">
                                <div class="profile-container rounded-circle overflow-hidden">
                                    <?php if ($user['profile_image'] != null ):?>
                                        <img src=" <?= "/uploads/".$user['profile_image'] ?>" class="img-fluid" alt="" height="10" >
                                    <?php else: ?>
                                        <span class="material-symbols-outlined mt-4 fs-1">account_circle</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mx-5">
                                <p> <?= htmlspecialchars($post->getMessage()) ?> </p>
                            </div>
                            <div>
                                <div class="row justify-content-end">
                                    <div class="col-3">
                                        <span class="material-symbols-outlined">favorite</span>
                                    </div>
                                    <div class="col-3">
                                        <span class="material-symbols-outlined">chat_bubble</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="tab-pane fade show active" id="reply-content" style="display: none;">
                <!-- Dynamic content for Followers should be loaded here -->
                reply
            </div>
            <div class="tab-pane fade show active" id="media-content" style="display: none;">
                <!-- Dynamic content for Followers should be loaded here -->
                media
            </div>
            <div class="tab-pane fade show active" id="like-content" style="display: none;">
                <!-- Dynamic content for Followers should be loaded here -->
                like
            </div>
        </div>
        <!-- モーダルの本体 -->
        <div class="modal fade"  id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ポップアップ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="form/profile?user_id=<?= $user['id']?>" id="send-form" method="post" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-primary float-end post-btn-popup">保存</button>
                        <input id="csrf_token_popup" type="hidden" name="csrf_token" value="<?= Helpers\CrossSiteForgeryProtection::getToken() ?>">

                        <div class="mb-3">
                            <input type="text" class="form-control" id="name-upload" name="name-upload" placeholder="name">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="introduction-upload" placeholder="introduction" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file-upload" class="form-label"><i class="fas fa-camera"></i> profile image</label>
                            <input type="file" class="form-control" id="file-upload" name="file-upload">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="address-upload" name="address-upload" placeholder="address">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="hobby-upload" name="hobby-upload" placeholder="hobby">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="age-upload" name="age-upload" placeholder="age">
                        </div>
                    </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn-popup" data-bs-dismiss="modal">閉じる</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-2">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/profile.js"></script>
<style>
        .profile-container {
            width: 130px;
            height: 130px;
        }

        /*  */

</style>