function post_candidates() {
    var formEl = document.forms.postCandidates;
    var formData = new FormData(formEl);
    //console.log(formData.get('first_name'));
    var actionData = 'action=post_candidate' ;
    actionData+='&shortcode='+formData.get('cShortcode');
    actionData+='&name='+formData.get('first_name')+ ' '+formData.get('last_name');
    actionData+='&first_name='+formData.get('first_name')+ ' '+formData.get('last_name');

    var xhr = new XMLHttpRequest();
    var apiUrl = voy_ajax.ajax_url ;
    xhr.open("POST", apiUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    xhr.onload = function () {
        if (this.status >= 200 && this.status < 400) {
            // If successful
            console.log("API RESPONSE ",this.response);
        } else {
            // If fail
            console.log(this.response);
        }
    };
    xhr.onerror = function() {
        // Connection error
    };
    xhr.send('action=post_candidate&work_hours_start=Indpro');
    //xhr.send(actionData);

    return false;
}