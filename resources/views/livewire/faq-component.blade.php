@section('title', 'FAQ')

<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>FAQ</span></li>
        </ul>
    </div>
    <section class="faq">
        <h1>Frequently Asked Questions</h1>

        <div class="faq-container">
            <div class="faq-section">
                <div class="question" onclick="toggleAnswer('faq1')">How can I place an order?</div>
                <div class="answer" id="faq1">
                    <p>You can place an order by visiting our store directly or by calling our hotline. You can also place an order online through our website or mobile app.</p>
                </div>
            </div>

            <div class="faq-section">
                <div class="question" onclick="toggleAnswer('faq2')">Do you offer delivery services?</div>
                <div class="answer" id="faq2">
                    <p>Yes, we offer delivery services. Simply provide your address and contact details when placing your order, and we will deliver it to your doorstep.</p>
                </div>
            </div>

            <div class="faq-section">
                <div class="question" onclick="toggleAnswer('faq3')">What payment methods do you accept?</div>
                <div class="answer" id="faq3">
                    <p>We accept cash, credit/debit cards, and online payment methods such as PayPal or Stripe. Please note that payment options may vary depending on the platform used for placing your order.</p>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function toggleAnswer(id) {
      var answer = document.getElementById(id);
      answer.style.display = (answer.style.display === "none" || answer.style.display === "") ? "block" : "none";
    }
</script>


