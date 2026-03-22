</div>

<div class="status-bar">
    <div>SYSTEM: READY</div>
    <div id="clock">00:00:00</div>
    <div>ENCRYPTION: AES-256</div>
</div>

<script>
    // 시계 업데이트
    function updateClock() {
        const now = new Date();
        document.getElementById('clock').innerText = now.toLocaleTimeString();
    }
    setInterval(updateClock, 1000);
    updateClock();

    function login() {
        const id = document.getElementById('user-id').value;
        const pass = document.getElementById('access-password').value;
        const status = document.getElementById('login-status');
        
        if (!status) return;
        
        status.innerText = "AUTHENTICATING...";
        status.style.color = "var(--text-color)";

        setTimeout(() => {
            if (id === "admin" && pass === "1234") { // 임시 계정
                document.getElementById('login-screen').style.display = 'none';
                document.getElementById('diary-screen').style.display = 'block';
                document.getElementById('current-user').innerText = id.toUpperCase();
                console.log('Access Granted.');
            } else {
                status.innerText = "ERROR: INVALID CREDENTIALS";
                status.style.color = "var(--error-color)";
                document.getElementById('access-password').value = "";
            }
        }, 800);
    }

    function saveDiary() {
        const title = document.getElementById('diary-title').value;
        if(!title) {
            alert('TITLE IS REQUIRED');
            return;
        }
        alert('SAVING TO SECTOR 0x' + Math.floor(Math.random() * 1000).toString(16).toUpperCase() + '...');
    }

    function logout() {
        location.reload();
    }
</script>
</body>
</html>
