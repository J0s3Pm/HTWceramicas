<section class="products py-5" id="productos">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-subtitle">

                PRODUCTOS DESTACADOS

            </span>

            <h2 class="section-title mt-3">

                Calidad que transforma tus espacios

            </h2>

            <p class="section-text">

                Descubre algunos de nuestros productos más destacados.

            </p>

        </div>

        <div class="row g-4">

            @php

            $productos=[

                [
                    'img'=>'producto1.jpg',
                    'nombre'=>'Cerámico Carrara',
                    'marca'=>'Celima',
                    'precio'=>'89.90'
                ],

                [
                    'img'=>'producto2.jpg',
                    'nombre'=>'Lavatorio Moderno',
                    'marca'=>'Trebol',
                    'precio'=>'249.90'
                ],

                [
                    'img'=>'producto3.jpg',
                    'nombre'=>'Grifería Monocomando',
                    'marca'=>'Vainsa',
                    'precio'=>'199.90'
                ],

                [
                    'img'=>'producto4.jpg',
                    'nombre'=>'Tina de Baño',
                    'marca'=>'Italgrif',
                    'precio'=>'489.90'
                ]

            ];

            @endphp

            @foreach($productos as $producto)

            <div class="col-lg-3 col-md-6">

                <div class="product-card">

                    <img src="{{ asset('images/productos/'.$producto['img']) }}"
                        class="img-fluid">

                    <div class="product-body">

                        <span class="product-brand">

                            {{ $producto['marca'] }}

                        </span>

                        <h5>

                            {{ $producto['nombre'] }}

                        </h5>

                        <h4>

                            S/. {{ $producto['precio'] }}

                        </h4>

                        <a href="#" class="product-btn">

                            Ver Producto

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>
