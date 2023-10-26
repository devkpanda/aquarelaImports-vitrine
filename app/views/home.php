<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Aquarela Imports - Vitrine Virtual</title>
</head>

<body class="bg-white">
    <div>
        <div id="navbar" class="h-28 bg-black grid-cols-1 flex justify-center items-center">
        <div class="form-control">
  <div class="input-group ">
    <input type="text" placeholder="Pesquise seu produto aqui" class="input input-bordered" />
    <button class="btn btn-square">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
    </button>
</div>
  </div>
</div>
        </div>
        <div id="categorias" class="min-w-full h-28 bg-orange-500 flex justify-center items-center">
            <div>
                <a href="#bicicleta"><img
                        class="max-h-24 items-center px-6 pt-4  hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                        src="/app/views/images/bicicleta-sem-fundo.png" alt="" /></a>
            </div>
            <div>
                <a href="#componentes"><img
                        class="max-h-24 items-center pt-4 px-6 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                        src="/app/views/images/componentes-sem-fundo.png" alt="" /></a>
            </div>
            <div>
                <a href="#ferramentas"><img
                        class="max-h-24 px-6 pt-4 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                        src="/app/views/images/ferramentas-sem-fundo.png" alt="" /></a>
            </div>
            <div>
                <a href="#mobiletes"><img
                        class="max-h-24 px-6 pt-4 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                        src="/app/views/images/mobiletes-sem-fundo.png" alt="" /></a>
            </div>
            <div>
                <a href="#vestuario"><img
                        class="max-h-24 px-6 pt-4 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                        src="/app/views/images/vestuari-sem-fundo.png" alt="" /></a>
            </div>
        </div>
        <div class="carousel w-full">
            <div id="slide1" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-1-mobilete-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide4" class="btn btn-circle">❮</a>
                    <a href="#slide2" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide2" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-2-kitferramentas-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2 max-h-40">
                    <a href="#slide1" class="btn btn-circle">❮</a>
                    <a href="#slide3" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-1-mobilete-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle">❮</a>
                    <a href="#slide4" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide4" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-1-mobilete-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide3" class="btn btn-circle">❮</a>
                    <a href="#slide1" class="btn btn-circle">❯</a>
                </div>
            </div>
        </div>

        <div id="componentes" class="border border-gray-100"></div>
        <div>

            <div class="flex justify-between w-3/4 mx-auto pt-5 pb-6">
                <h2 class="text-2xl text-black py-5 pr-3">Se liga nos nossos componentes pra sua bicicleta top</h2>
                <a href="#none" class="py-5 text-2xl underline" onclick="modalpoucoanuncio.showModal()">Ver mais</a>
            </div>
            <div class="flex justify-center items-center pb-5">
                <div class="grid md:grid-cols-4 gap-10 w-3/4 pb-8 sm:pr-3">
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Conjunto Freio à disco.webp"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Conjunto Freio à disco</h2>
                            <p class="text-black">Conjunto de instalação de freio à disco para bicicletas. Contendo dois
                                discos, duas pinças com quatro pastilhas, dois cabos com conduites</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Coroa.jpg" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Coroa</h2>
                            <p class="text-black">Coroa convencional para bicicletas sem marcha. 44 dentes</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Pedivela.jpeg" alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Pedivela</h2>
                            <p class="text-black">Pedivila convencional de alumínio, 44mm</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Pedal de Alumínio.jpeg"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Pedal de Alumínio</h2>
                            <p class="text-black">Pedal resistente de alumínio, com maior resistência à impactos,
                                podendo vir com rosca grossa ou rosca fina</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ferramentas" class="border border-gray-100"></div>
            <div class="flex justify-between w-3/4 mx-auto pt-5 pb-6">
                <h2 class="text-2xl text-black py-5 pr-3">Se liga nas nossas ferramentas pra manutenção</h2>
                <a href="#none" class="py-5 text-2xl underline" onclick="modalpoucoanuncio.showModal()">Ver mais</a>
            </div>
            <div class="flex justify-center items-center pb-5">
                <div class="grid md:grid-cols-4 gap-10 w-3/4 pb-8 sm:pr-3">
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Kit de Remendo Peneu.webp"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Kit de remendo Pneu</h2>
                            <p class="text-black">Kit portátil completo para remendo de câmaras a frio, com todo o
                                necessário para a realização do remendo. Contém no kit, espátulas, chaves para fixação e
                                soltura da roda, remendo, cola para borracha, lixa d'água</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Extrator do Movimento Central.jpg"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Extrator do movimento central</h2>
                            <p class="text-black">Saca polia para extrair o movimento central de bicicletas
                                convencionais</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Kit Catraca.webp" alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Kit catraca</h2>
                            <p class="text-black">Kit de chave catracada portátil com 10 opções de soquetes</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-50 object-cover" src="/app/views/images/Maleta de Ferramentas.jpg"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Maleta de Ferramentas</h2>
                            <p class="text-black">Maleta de ferramentas alemã, com todo tipo de ferramenta utilizada na
                                manutenção de bicicletas.</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mobiletes" class="border border-gray-100"></div>
            <div class="flex justify-between w-3/4 mx-auto pt-5 pb-6">
                <h2 class="text-2xl text-black py-5 pr-3">Se liga nas nossas bicicletas motorizadas</h2>
                <a href="#none" class="py-5 text-2xl underline" onclick="modalpoucoanuncio.showModal()">Ver mais</a>
            </div>
            <div class="flex justify-center items-center pb-5">
                <div class="grid md:grid-cols-4 gap-10 w-3/4 pb-8 sm:pr-3">
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Bicicleta Motorizada Moskito.jpg"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Bicicleta Motorizada Moskito</h2>
                            <p class="text-black">Bicicleta motorizada com motor 2 tempos 80cc. Tanque com capacidade de
                                1,5L e autonomia geral de 40km/L</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Mobilete Motor Estacionário.webp"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Mobilete com motor estacionário</h2>
                            <p class="text-black">Mobilete quadro WMX com motor estacionário. Quadro com tanque com 2L
                                de capacidade. Consumo pode chegar a 50km/L</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Mobilete 4 tempos.jpeg"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Mobilete 4 Tempos</h2>
                            <p class="text-black">A conhecida mobilete 4 tempos, agora com motor 90cc e 4 marchas,
                                podendo chegar a até 100km/h com autonomia máxima de 50km/L. Capacidade para até 2
                                pessoas</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Bicicleta Motorizada Moskito.jpg"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Shoes!</h2>
                            <p class="text-black">If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="vestuario" class="border border-gray-100"></div>
            <div class="flex justify-between w-3/4 mx-auto pt-5 pb-6">
                <h2 class="text-2xl text-black py-5 pr-3 ">Se liga nas nossas roupas de ciclismo</h2>
                <a href="#none" class="py-5 text-2xl underline" onclick="modalpoucoanuncio.showModal()">Ver mais</a>
            </div>
            <div class="flex justify-center items-center pb-5">
                <div class="grid md:grid-cols-4 gap-10 w-3/4 pb-8 sm:pr-3">
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Capacete Absolute.webp"
                                alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Capacete absolute</h2>
                            <p class="text-black">Capacete de marca absolute com ajuste de tamanho universal, disponível
                                em diversas cores, com ou sem LED de sinalização</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Luvas Ciclismo.webp" alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Luvas Ciclismo</h2>
                            <p class="text-black">Luvas revestidas com gel para permitir maior conforto ao ciclista,
                                evitando feridas ao apoiar a mão no guidão</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Shorts para Bike.jpg" alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Shorts para bike</h2>
                            <p class="text-black">Shorts para ciclista com forro em gel</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-80 bg-base-100 bg-slate-50 text-primary-content">
                        <figure><img class="w-full h-52 object-cover" src="/app/views/images/Meia oggi.webp" alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-black">Meia oggi</h2>
                            <p class="text-black">Meião para ciclista de marca Oggi</p>
                            <div class="card-actions justify-end">
                                <p class="mt-3 text-black">R$ 150</p>
                                <button
                                    class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300"
                                    onclick="modalsemcompra.showModal()">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <footer class="footer p-10 bg-neutral text-neutral-content">
            <div>
                <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                    clip-rule="evenodd" class="fill-current">
                    <path
                        d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                    </path>
                </svg>
                <p>Aquarela Imports<br />Promovendo produtos de qualidade</p>
            </div>
            <div>
                <span class="footer-title">Social</span>
                <div class="grid grid-flow-col gap-4">
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                            </path>
                        </svg></a>
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                            </path>
                        </svg></a>
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                            </path>
                        </svg></a>
                </div>
            </div>
        </footer>
    </div>
    <dialog id="modalsemcompra" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box bg-slate-100">
            <h3 class="font-bold text-lg text-black">Olá Cliente! Desculpe-nos pelo inconveniente mas nosso site ainda
                está em desenvolvimento.</h3>
            <p class="py-4 text-black">No momento ainda não temos opção de compra no nosso site, mas você pode nos
                contatar pelo whatsapp! Basta clicar no link: </p><a
                href="https://wa.me/5511978654859?text=Ol%C3%A1%2C+estou+interessado+nos+produtos+da+Aquarela+Imports%2C+podem+me+dar+mais+informa%C3%A7%C3%B5es%3F">
                <p class="underline text-blue-600">https://wa.me/5511978654859</p>
            </a>. <br> <img src="/app/views/images/qrcode.png" alt=""> <br>
            <p class="text-black">Lembrando que todos os nossos preços são ficticios no momento pois o site ainda está
                em desenvolvimento...</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button
                    class="btn border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300 text-white">Close</button>
            </div>
        </form>
    </dialog>
    <dialog id="modalpoucoanuncio" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box bg-slate-100">
            <h3 class="font-bold text-lg text-black">Olá Cliente! Desculpe-nos pelo inconveniente mas nosso site ainda
                está em desenvolvimento.</h3>
            <p class="py-4 text-black">No momento ainda não temos todos os nossos anuncios no site, mas você pode nos
                contatar pelo whatsapp para ver mais produtos! Basta clicar no link: </p> <a
                href="https://wa.me/5511978654859?text=Ol%C3%A1%2C+estou+interessado+nos+produtos+da+Aquarela+Imports%2C+podem+me+dar+mais+informa%C3%A7%C3%B5es%3F">
                <p class="underline text-blue-600">https://wa.me/5511978654859</p>
            </a>. <br> <img src="/app/views/images/qrcode.png" alt=""><br>
            <p class="text-black">Lembrando que todos os nossos preços são ficticios no momento pois o site ainda está
                em desenvolvimento.</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button
                    class="btn border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300 text-white">Close</button>
            </div>
        </form>
    </dialog>
    <script src="/public/assets/js/script.js"></script>
</body>

</html>