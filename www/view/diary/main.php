<?php
require_once '../../../vendor/autoload.php';

use EdenProject\MyWay\ApplicationFactory;

$app = ApplicationFactory::create();

?>
<?php require_once '../../../fragments/header.php'; ?>

<div id="diary-main-screen" class="diary-container">
    <div class="line">MYWAY DIARY SYSTEM v1.0.4 - [ FLUID_MODE ACTIVE ]</div>
    <div class="line">----------------------------------------------------------------------------------------------------</div>
    
    <div class="grid-layout">
        <!-- 좌측 패널: 시스템 정보 -->
        <aside class="panel">
            <div class="panel-header">SYSTEM MONITOR</div>
            <div class="line">CPU: <span id="cpu-load">02</span>% [||........]</div>
            <div class="line">MEM: <span id="mem-load">48</span>% [|||||.....]</div>
            <div class="line">DISK: 1.2MB / 1.44MB</div>
            <div class="line">UPTIME: 00:42:15</div>
            <br>
            <div class="panel-header">QUICK SHORTCUTS</div>
            <div class="line">> <a href="write.php" class="diary-link">NEW ENTRY</a></div>
            <div class="line">> <a href="#" class="diary-link">BACKUP (DISK)</a></div>
            <div class="line">> <a href="?theme=terminal" class="diary-link">RETRO MODE</a></div>
            <div class="line">> <a href="?theme=cute" class="diary-link">CUTE MODE</a></div>
            <div class="line">> <a href="../user/signin.php" class="diary-link">SHUTDOWN</a></div>
        </aside>

        <!-- 중앙 패널: 일기 목록 (메인) -->
        <main class="panel" style="min-height: 60vh;">
            <div class="panel-header">DIARY ENTRIES</div>
            <div id="diary-list">
                <div class="line">
                    <span class="dim">[2026-03-23]</span> 
                    <a href="read.php?id=1" class="diary-link">오늘의 첫 번째 기록... (새로운 기능 테스트 중)</a>
                </div>
                <div class="line">
                    <span class="dim">[2026-03-22]</span> 
                    <a href="read.php?id=2" class="diary-link">비밀번호를 바꿨다. 동생이 본 것 같아. (주의 필요)</a>
                </div>
                <div class="line">
                    <span class="dim">[2026-03-21]</span> 
                    <a href="read.php?id=3" class="diary-link">비가 오는 날의 감상. 90년대 감성이 그립다.</a>
                </div>
                <div class="line">
                    <span class="dim">[2026-03-20]</span> 
                    <a href="read.php?id=4" class="diary-link">터미널 UI 작업을 시작했다. 생각보다 잘 나오는군.</a>
                </div>
                <!-- 스크롤 테스트용 데이터 -->
                <?php for($i=19; $i>=10; $i--): ?>
                <div class="line">
                    <span class="dim">[2026-03-<?= $i ?>]</span> 
                    <a href="#" class="diary-link">과거의 기록 내용입니다. (ID: <?= $i ?>)</a>
                </div>
                <?php endfor; ?>
            </div>
            <br>
            <div class="line">
                <button onclick="location.href='write.php'">[ CREATE NEW ENTRY ]</button>
            </div>
        </main>

        <!-- 우측 패널: 달력 및 로그 -->
        <aside>
            <div class="panel">
                <div class="panel-header">MARCH 2026</div>
                <div class="ascii-art">
  SU MO TU WE TH FR SA
      1  2  3  4  5  6
   7  8  9 10 11 12 13
  14 15 16 17 18 19 20
  21 22 23 24 25 26 27
  28 29 30 31
                </div>
            </div>
            <br>
            <div class="panel" style="font-size: 0.8em;">
                <div class="panel-header">SYSTEM LOGS</div>
                <div class="line dim">> USER 'ADMIN' LOGGED IN</div>
                <div class="line dim">> DB_CONNECT: SUCCESS</div>
                <div class="line dim">> FS_SCAN: 14 ENTRIES FOUND</div>
                <div class="line dim">> ENCRYPTION: ACTIVE</div>
            </div>
        </aside>
    </div>
</div>

<div class="status-bar">
    <div>
        <span class="status-bar-item">SYSTEM: READY</span>
        <span class="status-bar-item" id="terminal-time"><?= date('H:i:s') ?></span>
        <span class="status-bar-item">STORAGE: 84% FULL</span>
    </div>
    <div>
        <span>LOGGED AS: GUEST_USER</span>
        <span style="margin-left: 20px;">UTF-8</span>
    </div>
</div>

<script>
    // 시스템 정보 시뮬레이션
    setInterval(() => {
        const cpu = Math.floor(Math.random() * 10) + 1;
        document.getElementById('cpu-load').textContent = cpu.toString().padStart(2, '0');
        
        const now = new Date();
        const timeStr = now.getHours().toString().padStart(2, '0') + ':' + 
                        now.getMinutes().toString().padStart(2, '0') + ':' + 
                        now.getSeconds().toString().padStart(2, '0');
        document.getElementById('terminal-time').textContent = timeStr;
    }, 1000);
</script>

<style>
    .diary-link {
        color: var(--text-color);
        text-decoration: none;
    }
    .diary-link:hover {
        background-color: var(--text-color);
        color: var(--bg-color);
    }
    .dim {
        color: var(--dim-color);
        margin-right: 10px;
    }
    .panel a {
        text-decoration: underline;
    }
</style>

<?php require_once '../../../fragments/footer.php'; ?>
