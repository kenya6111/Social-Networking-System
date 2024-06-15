<div class="row d-flex w-100">
    <div class="col-2">
        <div>
            <a href="/profile?user_id=<?= htmlspecialchars($loginUserId);?>">
                <span class="material-symbols-outlined ms-2 fs-1">account_circle</span>
            </a>
            <h5 class="ms-3 pt-2"><?=htmlspecialchars($post['username']) ?></h5>    
        </div>
            <ul class="navbar-nav">
                <li class="nav-item border text-center rounded-pill mb-3 shadow btn-color">
                    <a class="nav-link text-light" href="/homepage">home</a>
                </li>
                <li class="nav-item border text-center rounded-pill mb-3 shadow btn-color">
                    <a class="nav-link text-light" href="/notice">notice</a>
                </li>
                <li class="nav-item  border  text-center rounded-pill mb-3 shadow btn-color">
                    <a class="nav-link text-light" href="/message">message</a>
                </li>
            </ul>
        
    </div>
    <div class="col-8  d-flex flex-column justify-content-center border ">
        <!-- トレンドorフォロワー-->
        <div class="d-flex border-bottom w-100" role="group" aria-label="Basic example">
            <button type="button" class="tf-btn btn flex-fill" id="trend-btn">Trend</button>
            <button type="button" class="tf-btn btn flex-fill" id="follow-btn">Follower</button>
        </div>
        <!-- ポストフィールド -->
        <div class="card">
            <div class="card-body">
                <form action="form/post" id="send-form" method="post" enctype="multipart/form-data">
                    <input id="csrf_token" type="hidden" name="csrf_token" value="<?= Helpers\CrossSiteForgeryProtection::getToken() ?>">
                    <div class="mb-3">
                        <textarea class="form-control" name="text" placeholder="write something here " rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file-upload" class="form-label"><i class="fas fa-camera"></i> 画像をアップロード</label>
                        <input type="file" class="form-control file-button" id="file-upload" name="file-upload">
                    </div>
                    <div class="mb-3">
                        <label for="file-upload-movie" class="form-label"><i class="fas fa-camera"></i> 動画をアップロード</label>
                        <input type="file" class="form-control file-button" id="file-upload-movie" name="file-upload-movie">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">ポストする</button>
                </form>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="trend-content">
                <!-- Dynamic content for Trend should be loaded here -->
                <ul id ="list-group" class="list-group list-unstyled">
                    <?php foreach ($posts as $post): ?>
                        <input id="post_id" type="hidden" name="post_id" value="<?= $post['post_id']?>">
                        <input id="user_id" type="hidden" name="user_id" value="<?= $post['user_id']?>">
                        <?php $modalId = 'exampleModal' . $post['id']; ?>
                        <li class=" post border-top pt-2 pb-2 clickable-post" data-url="/post?post_id=<?= $post['post_id'];?>">
                                <div class="d-flex">
                                    <a href="/profile?user_id=<?= $post['id'];?>">
                                        <span class="material-symbols-outlined ms-2 fs-1">account_circle</span>
                                    </a>
                                    <h5 class="ms-3 pt-2"><?=htmlspecialchars($post['username']) ?></h5>
                                </div>
                                <div class="mx-5">
                                    <p> <?= htmlspecialchars($post['message']) ?> </p>
                                </div>
                                <?php if ($post['image']): ?>
                                    <div class="mx-5 mb-3">
                                        <img src=" <?= "/uploads/".$post['image'] ?>" class="img-fluid" alt="">
                                    </div>
                                <?php endif; ?>
                                <?php if ($post['video']): ?>
                                    <video width="320" height="240" controls>
                                        <source src="<?= "/uploads/".htmlspecialchars($post['video']); ?>" type="video/mp4">
                                    </video>
                                <?php endif; ?>
                                <div>
                                    <div class="row justify-content-end">
                                        <div class="col-3">
                                            <div id="like-button-after" class="d-none">💗</div>
                                            <span id="like-button-before" class="material-symbols-outlined">favorite</span><?= $post['like_count']?>
                                        </div>
                                        <div class="col-3 reply-btn" >
                                            <!-- <span class="material-symbols-outlined">chat_bubble</span> -->
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
                                              返信
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- モーダルの本体 -->
                                <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ポップアップ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="card">
                                        <div class="card-body">
                                            <form action="form/post?post_id=<?= $post['post_id']?>&user_id=<?= $post['user_id']?>" id="send-form" method="post" enctype="multipart/form-data">
                                                <input id="csrf_token_popup" type="hidden" name="csrf_token" value="<?= Helpers\CrossSiteForgeryProtection::getToken() ?>">
                                                <div class="mb-3">
                                                    <textarea class="form-control" name="text" placeholder="write something here " rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file-upload" class="form-label"><i class="fas fa-camera"></i> メディアをアップロード</label>
                                                    <input type="file" class="form-control" id="file-upload" name="file-upload">
                                                </div>
                                                <button type="submit" class="btn btn-primary float-end post-btn-popup">ポストする</button>
                                            </form>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close-btn-popup" data-bs-dismiss="modal">閉じる</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
                    
            
            <div class="tab-pane fade show active" id="follower-content" style="display: none;">
                <!-- Dynamic content for Followers should be loaded here -->
                <ul id ="list-group" class="list-group list-unstyled">
                    <?php foreach ($posts2 as $post): ?>
                        <input id="post_id" type="hidden" name="post_id" value="<?= $post['post_id']?>">
                        <input id="user_id" type="hidden" name="user_id" value="<?= $post['user_id']?>">
                        <?php $modalId = 'exampleModal' . $post['id']; ?>
                        <li class=" post border-top pt-2 pb-2 clickable-post" data-url="/post?post_id=<?= $post['post_id'];?>">
                                <div class="d-flex">
                                    <a href="/profile?user_id=<?= $post['id'];?>">
                                        <span class="material-symbols-outlined ms-2 fs-1">account_circle</span>
                                    </a>
                                    <h5 class="ms-3 pt-2"><?=htmlspecialchars($post['username']) ?></h5>
                                </div>
                                <div class="mx-5">
                                    <p> <?= htmlspecialchars($post['message']) ?> </p>
                                </div>
                                <?php if ($post['image']): ?>
                                    <div class="mx-5 mb-3">
                                        <img src=" <?= "/uploads/".$post['image'] ?>" class="img-fluid" alt="">
                                    </div>
                                <?php endif; ?>
                                <?php if ($post['video']): ?>
                                    <video width="320" height="240" controls>
                                        <source src="<?= "/uploads/".htmlspecialchars($post['video']); ?>" type="video/mp4">
                                    </video>
                                <?php endif; ?>
                                <div>
                                    <div class="row justify-content-end">
                                        <div class="col-3">
                                            <div id="like-button-after" class="d-none">💗</div>
                                            <span id="like-button-before" class="material-symbols-outlined">favorite</span><?= $post['like_count']?>
                                        </div>
                                        <div class="col-3 reply-btn" >
                                            <!-- <span class="material-symbols-outlined">chat_bubble</span> -->
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
                                              返信
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- モーダルの本体 -->
                                <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ポップアップ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="card">
                                        <div class="card-body">
                                            <form action="form/post?post_id=<?= $post['post_id']?>&user_id=<?= $post['user_id']?>" id="send-form" method="post" enctype="multipart/form-data">
                                                <input id="csrf_token_popup" type="hidden" name="csrf_token" value="<?= Helpers\CrossSiteForgeryProtection::getToken() ?>">
                                                <div class="mb-3">
                                                    <textarea class="form-control" name="text" placeholder="write something here " rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file-upload" class="form-label"><i class="fas fa-camera"></i> メディアをアップロード</label>
                                                    <input type="file" class="form-control" id="file-upload" name="file-upload">
                                                </div>
                                                <button type="submit" class="btn btn-primary float-end post-btn-popup">ポストする</button>
                                            </form>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close-btn-popup" data-bs-dismiss="modal">閉じる</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-2">
    </div>
</div>
<style>
.tf-btn:hover{
    background-color: rgba(249,249,249,1);
}
.btn-color{
    background-color: rgb(26, 145, 218, 1);

}
.file-button::file-selector-button {
  font-weight: bold;
  color: white;
  font-size: 14px;
  border: 0;
  border-radius: 10em;
  padding: 8px 16px;
  text-align: center;
}
</style>
<script src="/js/home.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
