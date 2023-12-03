@section('title', 'Messenger')

<div class="content">
    <div class="sidebar" id="sidebar">
        <div class="chatmates">
            <div class="chatmate">
                <img src="{{ asset('assets/img/avatars/avatar_1.png') }}" alt="Chatmate 1">
                <span>Greendee Roper Panogalon</span>
            </div>
            <div class="chatmate">
                <img src="{{ asset('assets/img/avatars/avatar_2.png') }}" alt="Chatmate 2">
                <span>Meriam Apatan Cerna</span>
            </div>
        </div>
        <div class="featured">
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype === 'ADM')
                        <ul>
                            <li><a href="/home">Home</a></li>
                            <li><a href="settings.html">Settings</a></li>
                            <li>
                                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <ul>
                            <li><a href="/home">Home</a></li>
                            <li><a href="settings.html">Settings</a></li>
                            <li>
                                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                @endauth
            @endif
        </div>
    </div>
    <main class="main" id="main">
        <div class="menu-toggle" onclick="toggleSidebar()">
            &#9776; Menu
        </div>
        <div class="conversation" id="conversation">
            <div class="profile">
                <img src="{{ asset('assets/img/avatars/avatar_1.png') }}" alt="Profile Picture">
                <h3>Greendee Roper Panogalon</h3>
                <p>Age: 20</p>
                <p>Location: Mabuhay, Carmen, Davao del Norte</p>
                <button class="view-profile">View Profile</button>
            </div>

            <div class="receiver-group">
                <div class="receiver-header">
                    <img src="{{ asset('assets/img/avatars/avatar_1.png') }}" alt="Receiver Picture">
                    <p class="receiver-name">Greendee Roper Panogalon</p>
                </div>
                <div class="receiver-content">
                    <p class="receiver-text">Dearest love of mine, there is not a star in the expanse of the universe that could shine as bright as you do. I hope that you have the best possible day and the sweetest dreams tonight.
                        There are not enough words in the English language to describe how beautiful you are. I could learn every language on Earth and still be at a loss for words trying to say how much I love you.
                        To me, you are sublime. You are one hundred orchestras playing the most beautiful symphonies at once.</p>
                    <p class="timestamp">10:30 AM</p>
                    <div class="message-buttons">
                        <button class="reply-button" title="reply"><span class="fa-regular fa-reply"></span></button>
                        <button class="share-button" title="share"><span class="fa-regular fa-share"></span></button>
                        <button class="like-button" title="like"><span class="fa-regular fa-thumbs-up"></span></button>
                        <button class="delete-button" title="delete"><span class="fa-regular fa-trash-can"></span></button>
                    </div>
                </div>
            </div>

            <div class="sender-group">
                <div class="sender-header">
                    <img src="{{ asset('assets/img/avatars/avatar_2.png') }}" alt="Profile Picture">
                    <p class="sender-name">Meriam Apatan Cerna</p>
                </div>
                <div class="sender-content">
                        <p class="text">Dearest love of mine, there is not a star in the expanse of the universe that could shine as bright as you do. I hope that you have the best possible day and the sweetest dreams tonight.
                            There are not enough words in the English language to describe how beautiful you are. I could learn every language on Earth and still be at a loss for words trying to say how much I love you.
                            To me, you are sublime. You are one hundred orchestras playing the most beautiful symphonies at once.</p>
                        <p class="timestamp">10:00 AM</p>
                    <div class="message-buttons">
                        <button class="reply-button" title="reply"><span class="fa-regular fa-reply"></span></button>
                        <button class="share-button" title="share"><span class="fa-regular fa-share"></span></button>
                        <button class="like-button" title="like"><span class="fa-regular fa-thumbs-up"></span></button>
                        <button class="delete-button" title="delete"><span class="fa-regular fa-trash-can"></span></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="message-input">
            <textarea type="text" id="message" placeholder="Type a message..."></textarea>
            <button onclick="sendMessage()">Send</button>
        </div>
    </main>
</div>
