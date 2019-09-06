<div class="container topMargin" style="margin-bottom: 90px;">
	<div class="mega-block">
		<div class="big-block-gauche">
    		{msg_valid}
    		<H1>Envoyez un message à {username}</H1>
    		<div class="chatbox">
    		    <div class="chatlogs">
            		<div class="chat friend">
            		    <div class="user-photo"></div>
            		    <p class="chat-message">What's up, Brother</p>
            		</div>
            		<div class="chat self">
            		    <div class="user-photo"><span>You</span></div>
            		    <p class="chat-message">What's up?</p>
            		</div>
            		<div class="chat friend">
            		    <div class="user-photo"></div>
            		    <p class="chat-message">Pensez à indiquer vos coordonnées téléphoniques pour que l'annonceur puisse vous contacter facilement. Tout démarchage publicitaire ou spamming sera éliminé.</p>
            		</div>
            		<div class="chat self">
            		    <div class="user-photo"></div>
            		    <p class="chat-message">What's up?</p>
            		</div>
            		<div class="chat friend">
            		    <div class="user-photo"></div>
            		    <p class="chat-message">Pensez à indiquer vos coordonnées téléphoniques pour que l'annonceur puisse vous contacter facilement. Tout démarchage publicitaire ou spamming sera éliminé.</p>
            		</div>
            		<div class="chat self">
            		    <div class="user-photo"></div>
            		    <p class="chat-message">What's up?</p>
            		</div>
            		<div class="chat friend">
            		    <div class="user-photo"></div>
            		    <p class="chat-message">Pensez à indiquer vos coordonnées téléphoniques pour que l'annonceur puisse vous contacter facilement. Tout démarchage publicitaire ou spamming sera éliminé.</p>
            		</div>
        		</div>
    		</div>
   		    <div class="chat-form">
   		        <textarea></textarea>
   		        <button>
   		            Send
   		        </button>
   		    </div>
    		<form method="POST">
    			
    		</form>
		</div>
	</div>
</div>
<style>
    .mega-block {
        margin-bottom: 50px;
    }
    
    .chatbox {
        width:500px;
        min-width: 390px;
        height: 600px;
        background: #ffffff;
        padding: 25px;
        margin: 20px auto;
        box-shadow:0 3px #cccccc;
    }
    
    .chatlogs {
        padding: 10px;
        width: 100%;
        height: 450px;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    
    .chatlogs::-webkit-scrollbar {
        width: 10px;
    }
    
    .chatlogs::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background: rgba(0,0,0, .1);
    }
    
    .chat {
        display: flex;
        flex-flow: row wrap;
        align-items: flex-start;
        margin-bottom: 10px;
    }
    
    .chat .user-photo {
        width: 60px;
        height: 60px;
        background: #cccccc;
        border-radius: 50%;
    }
    
    .chat .chat-message {
        width: 70%;
        padding: 15px;
        margin: 5px 10px 0;
        background: #1ddced;
        border-radius: 10px;
        color: #ffffff;
        font-size: 20px;
    }
    
    .friend .chat-message {
        background: #1adda4;
    }
    
    .self .chat-message {
        background: #1ddced;
        order: -1;
    }
    
    .self .user-photo{
        position: relative;    
    }
    
    .self .user-photo span{
        position: absolute;
        top: 18px;
        left: 16px;
        font-size: 18px;
        color: #ffffff;
    }
    
    .chat-form {
        margin-top: 20px;
        display: flex;
        align-items: flex-start;
        
    }
    
    .chat-form textarea {
        background: #fbfbfb;
        width: 75%;
        height: 50px;
        border: 2px solid #eeeeee;
        border-radius: 3px;
        resize: none;
        padding: 10px;
        font-size: 18px;
        color: #333333;
    }
    
    .chat-form textarea:focus {
        background: #ffffff;
    }
    
    .chat-form button {
        background: #1ddced;
        padding: 12px 15px;
        font-size: 40px;
        color: #ffffff;
        border: none;
        margin: 0 10px;
        border-radius: 3px;
        box-shadow: 0 3px 0 #0eb2c1;
        cursor: pointer;
        
        -webkit-transition: background .2s ease;
        -moz-transition: background .2s ease;
        -o-transition: background .2s ease;
    }
    
    .chat-form button:hover {
        background: #13c8d9;
    }
    
    .chat-form textarea::-webkit-scrollbar {
        width: 10px;
    }
    
    .chat-form textarea::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background: rgba(0,0,0, .1);
    }
</style>