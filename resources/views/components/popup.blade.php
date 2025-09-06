<!-- Notification Panel -->
<div class="notification-panel" id="notificationPanel">
    <div class="panel-header">
        <p class="panel-title">Notifikasi</p>
        <button class="close-panel" id="closeNotificationPanel">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="notification-content">
        <p>Notifikasi akan ditampilkan di sini. Fitur ini sedang dalam pengembangan.</p>
    </div>
</div>

<div class="artifical-intelegence-panel" id="AIPanel">
    <div class="panel-header">
        <p class="panel-title">AI Agent</p>
        <button class="close-panel" id="closeAIPanel">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="AI-content">
        <div class="chat-container" id="chatContainer">
            <!-- Messages will be added here -->
        </div>

        <div class="typing-indicator" id="typingIndicator">
            <span>Gemini Flash mengetik</span>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <div class="input-area">
            <textarea class="message-input" id="userInput" placeholder="Tanyakan tentang e-learning..."
                rows="1"></textarea>
            <button class="send-button" id="sendMessage">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>