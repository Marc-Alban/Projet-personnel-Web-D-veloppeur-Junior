let image = document.getElementById("profile-pic");
let name = document.getElementById("name");
let biography = document.getElementById("biography");
let posts = document.getElementById("posts");
let username = document.getElementById("username");
let nbPost = document.getElementById("number-of-posts");
let followers = document.getElementById("followers");
let following = document.getElementById("following");
let xhr = new XMLHttpRequest();
let post;
let postImg = document.getElementById("postImg");
let postLikeComment = document.getElementById("postLikeComment");
let postLikes = document.getElementById("postLikes");
let postComments = document.getElementById("postComments");
let postHtml = '';

function nFormatter(num) {
  if (num >= 1000000000) {
    return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + 'G';
  }
  if (num >= 1000000) {
    return (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
  }
  if (num >= 1000) {
    return (num / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
  }
  return num;
}

xhr.onreadystatechange = function() {
  if (this.readyState === 4 && this.status === 200) {
    let user = this.response.graphql.user;
    image.src = user.profile_pic_url;
    username.innerHTML = user.username;
    name.innerHTML = user.full_name;
    biography.innerHTML = user.biography;
    nbPost.innerHTML = user.edge_owner_to_timeline_media.count;
    followers.innerHTML = user.edge_followed_by.count;
    following.innerHTML = user.edge_follow.count;
    // Affichage des posts avec une boucle car c'est un tableau
    post = user.edge_owner_to_timeline_media.edges;
    let maxPost = post.length;

    if (maxPost > 10) {
      maxPost = 10;
    }

    for (let i = 0; i < maxPost; i++) {
      let url = post[i].node.display_url;
      let likes = post[i].node.edge_liked_by.count;
      let comments = post[i].node.edge_media_to_comment.count;
      postImg.src = url;
      postLikes.innerHTML = nFormatter(likes);
      postComments.innerHTML = nFormatter(comments);
    }

  } else if (this.readyState === 4 && this.status === 404) {
    alert('Erreur: 404: /');
  }
}

xhr.open("GET", "https://www.instagram.com/les3soldatsblancs?__a=1", true);
xhr.responseType = "json";
xhr.send();