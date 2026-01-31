<main class="service-detail-page">
    <!-- ... service details ... -->
    <div class="booking-section mt-8">
        <form method="POST" action="add_to_cart.php">
            <input type="hidden" name="service_id" value="wedding-planning">
            <input type="hidden" name="service_name" value="Wedding Planning">
            <input type="hidden" name="service_price" value="80000">
            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg text-lg">
                Book Now
            </button>
        </form>
    </div>
</main>