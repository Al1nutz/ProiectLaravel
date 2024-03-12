<form method="POST" action="{{ route('tickets.process', ['event_id' => $event->id_eve]) }}">
    @csrf

    <label for="ticket_type">Ticket Type:</label>
    <select name="ticket_type" id="ticket_type" required>
        <option value="general_access" data-price="30">General Access</option>
        <option value="vip" data-price="60">VIP</option>
    </select>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" min="1" required>

    <div id="total-price">Total Price: $0.00</div>

    <button type="submit">Purchase</button>
</form>

<script>
    // JavaScript to calculate and update the total price dynamically
    document.getElementById('quantity').addEventListener('input', function() {
        const quantity = parseInt(this.value) || 0;
        const ticketType = document.getElementById('ticket_type');
        const price = parseFloat(ticketType.options[ticketType.selectedIndex].getAttribute('data-price')) || 0;

        const totalPrice = quantity * price;
        document.getElementById('total-price').textContent = `Total Price: $${totalPrice.toFixed(2)}`;
    });
</script>
