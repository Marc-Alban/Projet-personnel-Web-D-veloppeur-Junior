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


$.ajax({
    url: "https://www.instagram.com/3bbigbangbourse?__a=1",
    type: 'get',
    success: function (response) {
        $(".profile-pic").attr('src', response.graphql.user.profile_pic_url);
        $(".name").html(response.graphql.user.full_name);
        $(".biography").html(response.graphql.user.biography);
        $(".username").html(response.graphql.user.username);
        $(".number-of-posts").html(response.graphql.user.edge_owner_to_timeline_media.count);
        $(".followers").html(nFormatter(response.graphql.user.edge_followed_by.count));
        $(".following").html(nFormatter(response.graphql.user.edge_follow.count));
        posts = response.graphql.user.edge_owner_to_timeline_media.edges;
        posts_html = '';
        for (var i = 0; i < 3; i++) {
            url = posts[i].node.display_url;
            posts_html += '<div class="col-md-4 equal-height"><img style="min-height:50px;background-color:#fff;width:100%" src="' +
                url + '"></div>';
        }
        $(".posts").html(posts_html);
    }
});



// --------------------------------------------------------

// This sample code will make a request to LinkedIn's API to retrieve and print out some
// basic profile information for the user whose access token you provide.

const https = require('https');

// Replace with access token for the r_liteprofile permission
const accessToken = 'accessToken';
const options = {
    host: 'api.linkedin.com',
    path: '/v2/me',
    method: 'GET',
    headers: {
        'Authorization': `Bearer ${accessToken}`,
        'cache-control': 'no-cache',
        'X-Restli-Protocol-Version': '2.0.0'
    }
};

const profileRequest = https.request(options, function (res) {
    let data = '';
    res.on('data', (chunk) => {
        data += chunk;
    });

    res.on('end', () => {
        const profileData = JSON.parse(data);
    });
});
profileRequest.end();