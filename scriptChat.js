displayBot();
function displayBot(){
    var html=``;
    html += `
    <div class="card">
		  <div class="card-header"><h2>This is Header<span id="closeBtn">&#10005;</span></h2></div>
		  <div class="card-body"></div>
		  <div class="card-footer"><input type="text" name="msg" id="msg" placeholder="Type here....."><button id="sendBtn">&#10147;</button></div>
	  </div>
    `;
    document.getElementById("chatBot").innerHTML=html;
}