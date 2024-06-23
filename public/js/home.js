
const trendContent = document.getElementById('trend-content');
const followerContent = document.getElementById('follower-content');

function trendClick(){
    trendContent.style.display = 'block';
    followerContent.style.display = 'none';
}
function followClick(){
    trendContent.style.display = 'none';
    followerContent.style.display = 'block';
}

let trendButton = document.getElementById('trend-btn');
let followButton = document.getElementById('follow-btn');

trendButton.onclick = trendClick;
followButton.onclick = followClick;

document.querySelectorAll('.post').forEach(post => {
    const postId = post.querySelector('input[name="post_id"]').value;
    const likeButtonBefore = document.getElementById(`like-button-before-${postId}`);
    const likeButtonAfter = document.getElementById(`like-button-after-${postId}`);
    const likeCountElement = document.getElementById(`like-count-${postId}`);

    likeButtonBefore.addEventListener('click',function(event){
    
        event.stopPropagation();
        event.preventDefault();
        let post_id=document.getElementById(`post-id-${postId}`).value
        let user_id=document.getElementById(`user-id-${postId}`).value
        const csrfHiddenValue = document.getElementById('csrf_token').value; // 隠しタグから値を取得
        const postData = {
            post_id: post_id,
            user_id: user_id,
            csrf_token: csrfHiddenValue
        }

            fetch('/addlike', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams(postData).toString()
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status) {

                        // let likeButtonAfter=document.getElementById("like-button-after")
                        // let likeButtonBefore=document.getElementById("like-button-before")
                        likeButtonAfter.classList.remove("d-none");
                        likeButtonBefore.classList.add("d-none");
                        // const likeCountElement = document.getElementById('like-count');
                    
                        // 現在のカウントを取得し、整数に変換
                        // let currentCount = parseInt(likeCountElement.innerText, 10);
                        // // カウントアップ
                        // currentCount++;
                        // // 更新されたカウントを表示
                        // likeCountElement.innerText = currentCount;
                        // カウントを更新
                        let currentCount = parseInt(likeCountElement.innerText, 10);
                        currentCount++;
                        likeCountElement.innerText = currentCount;
                    
                    } else {

                        alert(data.message);
                    }
                })
                .catch(error => {
                    alert(error);
                });
    });

    likeButtonAfter.addEventListener('click',function(event){
        event.stopPropagation();
        event.preventDefault();
        let post_id=document.getElementById(`post-id-${postId}`).value
        const csrfHiddenValue = document.getElementById('csrf_token').value; // 隠しタグから値を取得
        const postData = {
            post_id: post_id,
            csrf_token: csrfHiddenValue
        }

            fetch('/reducelike', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams(postData).toString()
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status) {

                        // let likeButtonAfter=document.getElementById("like-button-after")
                        // let likeButtonBefore=document.getElementById("like-button-before")
                        likeButtonBefore.classList.remove("d-none");
                        likeButtonAfter.classList.add("d-none");
                        // const likeCountElement = document.getElementById('like_count');
                    
                        // 現在のカウントを取得し、整数に変換
                        // let currentCount = parseInt(likeCountElement.innerText, 10);
                        // // カウントアップ
                        // currentCount--;
                        // // 更新されたカウントを表示
                        // likeCountElement.innerText = currentCount;

                        // カウントを更新
                        let currentCount = parseInt(likeCountElement.innerText, 10);
                        currentCount--;
                        likeCountElement.innerText = currentCount;
                    } else {

                        alert(data.message);
                    }
                })
                .catch(error => {
                    alert(error);
                });
    });
});
 document.querySelectorAll('.post').forEach(post => {
    post.addEventListener('click', function() {
        window.location.href = this.getAttribute('data-url');
    });
});

document.querySelectorAll('.reply-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});
document.querySelectorAll('.modal-dialog').forEach(button => {
    button.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});