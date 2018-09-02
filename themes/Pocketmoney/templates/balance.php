<?php

/* Template Name: Balance */

get_header(); ?>


<?php
if( !function_exists( 'api_enqueue_script' ) ) {
	echo('<span class="error"> This requires rmoney plugin to connect and fetch from API  </span>');
}

?>

 <main role="main" class="main container-lg" id="balance">
    <section class="balance grid auto-md-2 align-middle-md">
        <div class="balance__display unit-auto">
            <div class="balance-container">
                <input id="wallet" type="number" min="0.00" step="0.01" type="number" name="amount" required disabled class="active-input" value="">
                <span class="fa fa-spinner fa-spin"></span>
                <span class="bar"></span>
                <span class="currency">£</span>
                <label>Wallet Balance</label>
            </div>
            <div class="balance-container">
                <input id="goal" type="number" min="0.00" step="0.01" type="number" name="amount" required disabled class="active-input" value="">
                <span class="fa fa-spinner fa-spin"></span>
                <span class="bar"></span>
                <span class="currency">£</span>
                <label>Goal Balance</label>
            </div>
            <div class="balance-container">
                <input id="savings" type="number" min="0.00" step="0.01" type="number" name="amount" required disabled class="active-input" value="">
                <span class="fa fa-spinner fa-spin"></span>
                <span class="bar"></span>
                <span class="currency">£</span>
                <label>Savings Balance</label>
            </div>
            <div class="balance-container">
                <input id="total" type="number" min="0.00" step="0.01" type="number" name="amount" required disabled class="active-input" value="">
                <span class="fa fa-spinner fa-spin"></span>
                <span class="bar"></span>
                <span class="currency">£</span>
                <label>Total Savings</label>
            </div>
        </div>
        <div class="balance__image unit-auto">
            <div class="balance__image-container">
                <img src="<?php echo get_template_directory_uri() . '/dist/image/athena.jpg' ?>" alt="Athena">
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>