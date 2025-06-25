@extends('layout')

@section('title', 'Cart')

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4">Cart</h1>

    @if($items->isEmpty())
        <div class="alert alert-info">Your cart is empty.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th><input type="checkbox" id="selectAll"> All</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>
                            <input type="checkbox" class="item-checkbox" name="items[]" value="{{ $item->id }}">
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price }} $</td>
                        <td>
                            <input type="number" name="quantity" 
                                   data-product-id="{{ $item->product_id }}" 
                                   value="{{ $item->quantity }}" min="1" 
                                   class="form-control form-control-sm w-50 quantity-input">
                        </td>
                        <td>{{ $item->price * $item->quantity }} $</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item->product_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-end mt-4">
            <h4>Total amount: <strong>{{ $total }} $</strong></h4>
            <button type="button" id="checkoutButton" class="btn btn-success mt-2">Place Order</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="checkoutForm" action="{{ route('checkout.confirm') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="checkoutModalLabel">Confirm your order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="modal-cart-items"></div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email to receive the letter:</label>
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Выбрать/снять все чекбоксы
    $('#selectAll').click(function() {
        $('.item-checkbox').prop('checked', this.checked);
    });

    // Открыть модальное окно при клике на "Place Order"
    $('#checkoutButton').click(function() {
        let selectedItemsInputs = [];
        let selectedItemsInfo = [];

        $('input[name="items[]"]:checked').each(function() {
            const row = $(this).closest('tr');
            const productName = row.find('td:eq(1)').text().trim();
            const price = row.find('td:eq(2)').text().trim();
            const quantity = row.find('input[name="quantity"]').val();
            const amount = row.find('td:eq(4)').text().trim();

            selectedItemsInputs.push(`<input type="hidden" name="items[]" value="${$(this).val()}">`);
            selectedItemsInfo.push(`
                <div class="mb-2 border-bottom pb-2">
                    <strong>${productName}</strong><br>
                    Кол-во: ${quantity}, Цена: ${price}, Сумма: ${amount}
                </div>
            `);
        });

        if (selectedItemsInputs.length === 0) {
            alert("Выберите хотя бы один товар!");
            return;
        }

        $('#modal-cart-items').html(selectedItemsInputs.join('') + selectedItemsInfo.join(''));
        const modal = new bootstrap.Modal(document.getElementById('checkoutModal'));
        modal.show();
    });

    // Обновление количества в корзине через AJAX
    $('.quantity-input').on('change', function() {
        let productId = $(this).data('product-id');
        let newQuantity = $(this).val();

        $.ajax({
            url: `/cart/${productId}`,
            method: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                quantity: newQuantity
            },
            success: function(response) {
                location.reload(); // обновляем страницу, можно оптимизировать под обновление только суммы
            },
            error: function(xhr) {
                alert('Ошибка при обновлении количества');
            }
        });
    });
});
</script>
@endpush
