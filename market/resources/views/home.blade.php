@extends('layout')
@section('title') Main Page

@endsection
@section('main_content')

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
      <img src="https://i.pinimg.com/736x/86/8d/97/868d977abc66c2fc45c033376c323f80.jpg" 
         class="rounded-circle" 
         alt="Quality Cat Care" 
         width="140" 
         height="140"> 
      <h2 class="fw-normal">Quality Cat Care</h2>
        <p>Our premium cat products are designed with your feline's comfort and happiness in mind. From luxurious beds to irresistible toys, we’ve got it all.</p>
        <p><a class="btn btn-secondary" href="{{"/categories/"}}">Explore Products »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
         <img src="https://i.pinimg.com/736x/13/51/89/135189664c7f7189781e8c2146eed486.jpg" 
         class="rounded-circle" 
         alt="Quality Cat Care" 
         width="140" 
         height="140">
      <h2 class="fw-normal">Community Love</h2>
    
        <p>Join our community of cat lovers! Share stories, tips, and connect with others who adore their whiskered companions as much as you do.</p>
        <p><a class="btn btn-secondary" href="{{"/review/"}}">Join Us »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src="https://i.pinimg.com/736x/a4/d1/42/a4d142e929903b6b076b31026aa02db0.jpg" 
         class="rounded-circle" 
         alt="Quality Cat Care" 
         width="140" 
         height="140"> 
      <h2 class="fw-normal">Adopt & Save</h2>
        <p>Looking to add a new furry member to your family? Check out our adoption program and give a cat in need a loving home.</p>
        <p><a class="btn btn-secondary" href="{{"/about/"}}">About Us »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Innovative Cat Toys. <span class="text-body-secondary">Playtime reimagined.</span></h2>
        <p class="lead">Our cutting-edge toys are crafted to keep your cats entertained, active, and mentally stimulated. Because a happy cat means a happy you.</p>
      </div>
      <div class="col-md-5">
      <img src="https://i.pinimg.com/736x/9b/ca/46/9bca460144351dd06d0fda408003f5a8.jpg" 
         class="Placeholder: 500x500" 
         alt="Quality Cat Care" 
         width="500" 
         height="500"> 
         </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Eco-Friendly Products. <span class="text-body-secondary">Care for cats, care for the planet.</span></h2>
        <p class="lead">Our sustainable line of products ensures you can pamper your pet while reducing your ecological pawprint. It's a win-win!</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img src="https://i.pinimg.com/736x/a1/c2/bf/a1c2bf696c07f987d48a6d69f61e1c74.jpg" 
         class="Placeholder: 500x500" 
         alt="Quality Cat Care" 
         width="500" 
         height="500">  
    </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Tailored Nutrition. <span class="text-body-secondary">Purrfection in every bite.</span></h2>
        <p class="lead">Our range of healthy and delicious cat food is designed to cater to all breeds and ages. Every meal is a treat for your kitty!</p>
      </div>
      <div class="col-md-5">
      <img src="https://i.pinimg.com/736x/69/12/8b/69128b3b962cae223e692eb1bac692ae.jpg" 
         class="Placeholder: 500x500" 
         alt="Quality Cat Care" 
         width="500" 
         height="500">  
    </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

</div>

@endsection