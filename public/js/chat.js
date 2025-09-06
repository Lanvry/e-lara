// Configuration


// DOM Elements
const chatContainer = document.getElementById('chatContainer');
const userInput = document.getElementById('userInput');
const sendButton = document.getElementById('sendMessage');
const typingIndicator = document.getElementById('typingIndicator');

// Load messages from localStorage
function loadMessages() {
    const saved = localStorage.getItem('chatMessages');
    return saved ? JSON.parse(saved) : [];
}

// Save messages to localStorage
function saveMessages(messages) {
    localStorage.setItem('chatMessages', JSON.stringify(messages));
}

// Render chat history
function renderChat() {
    chatContainer.innerHTML = '';
    const messages = loadMessages();
    if (messages.length === 0) {
        addMessageToChat(
            'Halo! Saya Asisten E-Learning berbasis Gemini Flash. Ada yang bisa saya bantu?\n\nSaya bisa membantu dengan:\n1. Informasi program studi dan kurikulum\n2. Materi pembelajaran dan kursus\n3. Penjelasan konsep e-learning\n4. Bantuan terkait sistem pembelajaran online\n\nContoh pertanyaan:\n* "Apa saja program studi yang tersedia?"\n* "Jelaskan tentang kursus Pemrograman Web"\n* "Apa keuntungan e-learning?"',
            'ai',
            false
        );
    } else {
        messages.forEach(msg => {
            addMessageToChat(msg.content, msg.role, false);
        });
    }
}

// Add a new message to the chat
function addMessageToChat(message, sender, saveToStorage = true) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message');
    messageElement.classList.add(sender + '-message');

    const avatarElement = document.createElement('div');
    avatarElement.classList.add('message-avatar');
    if (sender === 'ai') avatarElement.classList.add('ai-avatar');
    avatarElement.innerHTML = sender === 'user' ?
        '<i class="fas fa-user"></i>' :
        '<i class="fas fa-robot"></i>';

    const contentElement = document.createElement('div');
    contentElement.classList.add('message-content');

    const bubbleElement = document.createElement('div');
    bubbleElement.classList.add('message-bubble');

    if (sender === 'ai') {
        bubbleElement.innerHTML = formatAIMessage(message);
    } else {
        bubbleElement.textContent = message;
    }

    contentElement.appendChild(bubbleElement);
    messageElement.appendChild(avatarElement);
    messageElement.appendChild(contentElement);

    if (typingIndicator.parentElement === chatContainer) {
        chatContainer.insertBefore(messageElement, typingIndicator);
    } else {
        chatContainer.appendChild(messageElement);
    }

    setTimeout(() => {
        messageElement.classList.add('show');
        // Scroll to bottom setiap ada chat baru
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }, 10);

    setTimeout(() => {
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }, 50);

    if (sender === 'ai') {
        setTimeout(() => {
            const lastBlock = document.querySelector('pre code:last-of-type');
            if (lastBlock && !lastBlock.dataset.highlighted) {
                hljs.highlightElement(lastBlock);
            }
        }, 100);
    }



    // Save to localStorage
    if (saveToStorage) {
        const messages = loadMessages();
        messages.push({ role: sender, content: message });
        saveMessages(messages);
    }

    return messageElement;
}

// Escape HTML for security
function escapeHTML(str) {
    return str.replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;');
}

// Format AI responses with markdown-like syntax
function formatAIMessage(text) {
    let formattedText = text;

    // Extract code blocks first
    const codeBlocks = [];
    formattedText = formattedText.replace(/```(\w*)\n([\s\S]*?)\n```/g, function (match, lang, code) {
        codeBlocks.push({ lang, code });
        return `@@@CODEBLOCK${codeBlocks.length - 1}@@@`;
    });

    // Extract inline code
    const inlineCodes = [];
    formattedText = formattedText.replace(/`([^`]+)`/g, function (match, code) {
        inlineCodes.push(code);
        return `@@@INLINECODE${inlineCodes.length - 1}@@@`;
    });

    // Headers
    formattedText = formattedText.replace(/^# (.*$)/gm, '<h3>$1</h3>');
    formattedText = formattedText.replace(/^## (.*$)/gm, '<h4>$1</h4>');

    // Bold and italic
    formattedText = formattedText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
    formattedText = formattedText.replace(/\*(.*?)\*/g, '<em>$1</em>');

    // Numbered lists
    formattedText = formattedText.replace(/^\s*(\d+)\.\s+(.*$)/gm, '<li>$2</li>');
    formattedText = formattedText.replace(/(<li>.*<\/li>)+/g, function (match) {
        return '<ol>' + match + '</ol>';
    });

    // Bullet lists
    formattedText = formattedText.replace(/^\s*[\-*]\s+(.*$)/gm, '<li>$1</li>');
    formattedText = formattedText.replace(/(<li>.*<\/li>)+/g, function (match) {
        return '<ul>' + match + '</ul>';
    });

    // Links
    formattedText = formattedText.replace(/\[(.*?)\]\((.*?)\)/g,
        '<a href="$2" target="_blank" rel="noopener">$1</a>');

    // Restore code blocks (with escaped HTML)
    formattedText = formattedText.replace(/@@@CODEBLOCK(\d+)@@@/g, function (match, index) {
        const block = codeBlocks[index];
        const escapedCode = escapeHTML(block.code);
        return `<pre><code class="${block.lang}">${escapedCode}</code></pre>`;
    });

    // Restore inline code (with escaped HTML)
    formattedText = formattedText.replace(/@@@INLINECODE(\d+)@@@/g, function (match, index) {
        return `<code>${escapeHTML(inlineCodes[index])}</code>`;
    });

    // Add paragraph wrapper
    formattedText = formattedText.replace(/\n\n/g, '</p><p>');
    formattedText = '<p>' + formattedText + '</p>';

    return formattedText;
}

// Show typing indicator with animation
function showTypingIndicator() {
    typingIndicator.style.display = 'block';
    setTimeout(() => {
        typingIndicator.classList.add('show');
    }, 10);
}

// Hide typing indicator with animation
function hideTypingIndicator() {
    typingIndicator.classList.remove('show');
    setTimeout(() => {
        typingIndicator.style.display = 'none';
    }, 300);
}

// Send message to Gemini API
async function sendMessage() {
    const message = userInput.value.trim();
    if (message === '') return;

    addMessageToChat(message, 'user');
    userInput.value = '';
    userInput.style.height = 'auto';

    // showTypingIndicator();
    chatContainer.scrollTop = chatContainer.scrollHeight;
    const jurusanList = window.APP_CONFIG.jurusan.join(", ");
    const kursusList = window.APP_CONFIG.kursus.join(", ");

    const systemPrompt = `Kamu adalah asisten e-learning kampus dengan nama E-LARA (E-Learning Adaptive Resource with AI). Fokus hanya menjawab pertanyaan seputar jurusan dan kursus. Jurusan: ${jurusanList}. Kursus: ${kursusList}., dan bantu ketika masih masuk ke topic jika, sudah keluar dari topic maka berikan penolakan dengan halus, tolong jangan berikan jawaban soal, atau code atau apapun kamu hanya memberikan jawaban dan penjelasannya saja, jadi jangan langsung berikan jawaban`;

    try {
        // Get the entire conversation history for context
        const conversationHistory = [
            {
                role: 'user',
                parts: [{
                    text: systemPrompt
                }]
            },
            ...loadMessages().map(msg => {
                return {
                    role: msg.role === 'user' ? 'user' : 'model',
                    parts: [{ text: msg.content }]
                };
            })
        ];


        conversationHistory.push({
            role: 'user',
            parts: [{ text: message }]
        });

        const response = await fetch(window.APP_CONFIG.chatbot_url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": window.APP_CONFIG.csrf_token
            },
            body: JSON.stringify({ contents: conversationHistory })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        if (data.candidates && data.candidates[0].content.parts[0].text) {
            const aiResponse = data.candidates[0].content.parts[0].text;
            addMessageToChat(aiResponse, 'ai');
        } else {
            throw new Error('Invalid response format from API');
        }
    } catch (error) {
        console.error('Error:', error);
        addMessageToChat('Maaf, terjadi kesalahan saat memproses permintaan Anda. Silakan coba lagi.', 'ai');
    } finally {
        hideTypingIndicator();
    }
}

// Auto-resize textarea
userInput.addEventListener('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Send message on button click
sendButton.addEventListener('click', function () {
    sendMessage();
});

// Send message on Enter key (but allow Shift+Enter for new line)
userInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
});

// Initial render
renderChat();