@extends('layout')
@section('title') About Us @endsection

@section('main_content')
<div class="container">
    <h1 class="fw-bold mb-4">About Us</h1>
    <p>At <b>Cat`s company</b>, we are passionate about creating a world where cats and their owners can thrive together. Our mission is simple: to provide high-quality products, foster a loving community, and promote the well-being of cats everywhere.</p>
    
    <h2 class="fw-normal mt-5">Our Story</h2>
    <p>Founded in 2019, we started as a small team of cat enthusiasts with a vision to create a one-stop shop for everything a cat could possibly need. Over the years, we've grown into a trusted brand known for our carefully curated selection of cat products, ranging from nutritious food to fun toys and cozy beds.</p>
    
    <h2 class="fw-normal mt-4">Our Mission</h2>
    <p>We believe that cats deserve the best, and so do the people who love them. Our mission is to make life easier for cat owners by providing top-tier products that enhance the health, happiness, and comfort of cats. We’re committed to offering sustainable and eco-friendly options because we know that caring for your cat also means caring for the planet.</p>
    
    <h2 class="fw-normal mt-4">Our Values</h2>
    <ul>
        <li><strong>Quality</strong> - We only offer products that meet our high standards for durability and comfort.</li>
        <li><strong>Community</strong> - We are a team of like-minded individuals who share a love for cats, and we strive to create a space where others can connect, share, and learn.</li>
        <li><strong>Innovation</strong> - We stay at the forefront of the industry, continuously developing new products and solutions for our customers.</li>
        <li><strong>Sustainability</strong> - We are dedicated to reducing our ecological pawprint by offering eco-friendly products and practices.</li>
    </ul>
    
    <h2 class="fw-normal mt-4">Join Us in Making a Difference</h2>
    <p>Whether you're here to shop, share your love for cats, or adopt a new furry friend, we're happy to have you as part of our community. Together, we can make the world a better place for our feline companions. Thank you for choosing [Your Company Name] — where every cat gets the care they deserve.</p>
    
    <p><a class="btn btn-primary" href="{{ url('/categories') }}">Explore Our Products</a></p>
</div>
@endsection
