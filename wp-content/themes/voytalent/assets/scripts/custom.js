function post_candidates() {
    var x = document.getElementsByClassName("selectable");
    var cSkills = [];
    for(c=0; c < x.length;c++){
        cSkills.push(x[c].getAttribute("id"));
    }

    document.getElementById("submitCandidate").disabled = true;
    var formEl = document.forms.postCandidates;
    var formData = new FormData(formEl);
    var actionData = 'action=post_candidate' ;
    actionData+='&shortcode='+formData.get('cShortcode');
    actionData+='&name='+formData.get('first_name')+ ' '+formData.get('last_name');
    actionData+='&first_name='+formData.get('first_name');
    actionData+='&last_name='+formData.get('last_name');
    actionData+='&email='+formData.get('cEmail');
    actionData+='&phone='+formData.get('cPhone');
    actionData+='&summary='+formData.get('cSummary');
    actionData+='&skills='+cSkills.join();
    actionData+='&social_profiles[linkedin][url]='+formData.get('social_profiles[linkedin][url]');
    actionData+='&social_profiles[portfolio][url]='+formData.get('social_profiles[portfolio][url]');
    actionData+='&sourced=false';

    var xhr = new XMLHttpRequest();
    var apiUrl = voy_ajax.ajax_url ;
    xhr.open("POST", apiUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    xhr.onload = function () {
        if (this.status >= 200 && this.status < 400) {
            // If successful
            var result = JSON.parse(this.response);
            console.log("API Response ",result);

            document.getElementById("showPostCandidateResult").style.display = "block";
            showResult(result, false);
            document.getElementById("submitCandidate").disabled = false;

            /*setTimeout(function() {
                document.getElementById("showPostCandidateResult").style.display = "none";
            }, 2500);*/
        } else {
            // If fail
            console.log(this.response);
        }
    };
    xhr.onerror = function() {
        // Connection error
    };

   console.log('actionData -> ', actionData)

    xhr.send(actionData);

    return false;
}

//Send contact mail
function submit_contact(){
    document.getElementById("send_email").disabled = true;
    var formContact = document.forms.submitContact;
    var formContactData = new FormData(formContact);
    var actionData = 'action=send_email' ;
    actionData+='&subject='+formContactData.get('subject');
    actionData+='&comment='+formContactData.get('comment');
    actionData+='&fname='+formContactData.get('fname');
    actionData+='&lname='+formContactData.get('lname');
    actionData+='&c_email='+formContactData.get('c_email');
    actionData+='&c_phone='+formContactData.get('c_phone');

    var xhr = new XMLHttpRequest();
    var apiUrl = voy_ajax.ajax_url ;
    xhr.open("POST", apiUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    xhr.onload = function () {
        if (this.status >= 200 && this.status < 400) {
            var result = JSON.parse(this.response);
            console.log("Email Response ",result);
            document.getElementById("contactSubmitResult").style.display = "block";
            showResult(result, true);
            document.getElementById("send_email").disabled = false;
            /*setTimeout(function() {
                document.getElementById("contactSubmitResult").style.display = "none";
            }, 2500);*/
        } else {
            console.log(this.response);
        }
    };
    xhr.onerror = function() {
        // Connection error
    };
    xhr.send(actionData);
    return false;
}

function showResult(result, isContactForm) {
    if(result.hasOwnProperty('status') && (result.status == "success" || result.status == "created")){
        document.getElementById("result_sent").style.display = "block";
        document.getElementById("result_error").style.display = "none";
    }
    else if(result.hasOwnProperty('status')  && result.status == "error" && isContactForm){
        document.getElementById("result_sent").style.display = "none";
        document.getElementById("result_error").style.display = "block";
    }
    else if(!isContactForm && result.error != "undefined"){
        document.getElementById("result_sent").style.display = "none";
        document.getElementById("result_error").innerHTML = '<h2 class="header">' + result.error + '</h2>';
        document.getElementById("result_error").style.display = "block";
    }
}
