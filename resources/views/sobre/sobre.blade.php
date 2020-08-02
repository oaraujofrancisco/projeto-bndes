@extends('layouts.app')

@section('content')
<div class="container mt-4 p-5 shadow-lg bg-white rounded">
        <h4> O que é Saneamento? </h4>
        <hr>
        <p>Saneamento é o conjunto de medidas que visa preservar ou modificar as condições do meio ambiente com a finalidade de prevenir doenças e promover a saúde,
         melhorar a qualidade de vida da população e à produtividade do indivíduo e facilitar a atividade econômica. No Brasil, o saneamento básico é um direito assegurado pela Constituição 
         e definido pela Lei n°.11.445/2007 como o conjunto dos serviços, infraestrutura e Instalações operacionais de abastecimento de água, esgotamento sanitário, limpeza urbana, drenagem urbana, manejos de resíduos sólidos e de águas pluviais</p>
    </div>

    <div class="container mt-4 p-5 shadow-lg bg-white rounded">
        <h4> Por que precisamos de saneamento básico? </h4>
        <hr>
        <p>O saneamento básico é essencial para o desenvolvimento de um país e para o
        aumento da qualidade de vida das pessoas. Seu aperfeiçoamento e universalização
        promovem melhorias na saúde, principalmente de crianças, com a diminuição da mortalidade infantil e a contenção de doenças.</p> <br>
        
       <center>
            <img src="{{ asset('img/saneamento.jpg')}}" class="img-fluid" alt="some text" >
       </center> 
        <br>

        <p>Apesar de sua importância, cerca de  2,3 bilhões de pessoas em todo mundo ainda não têm acesso à nenhum serviço de saneamento? 
        Quando falamos de saneamento seguro, o número sobe para 4,5 bilhões de pessoas. O saneamento seguro se refere à segurança das 
        instalações e dos serviços prestados, por exemplo, a rede de esgoto estar conectada ao serviço de tratamento de esgoto
        
         </p>
               
    </div>
    <div class="container mt-4 p-5 shadow-lg bg-white rounded">
        <h4> Coleta e tratamento de esgoto </h4>
     <hr>
        <p>A coleta e o tratamento de esgoto fazem parte dos serviços de saneamento.
             A finalidade da coleta é levar o esgoto para longe das residências. enquanto a do tratamento é diminuir a carga poluidora 
         para que ele retorne à natureza sem causar prejuízos ao meio ambiente.</p>
        </div>
    <div>
        <div class="container mt-4 p-5 shadow-lg bg-white rounded">
        <h4> Distribuição de água potável no brasil </h4>
        <hr>  

        <p>A importância desse serviço está logo em seu nome, visto que a água potável é necessidade de todos os seres vivos.
             O acesso seguro à água potável é feito por meio do tratamento e 
            distribuição disponibilizados por uma companhia de saneamento.
        </p>   
        
            <center>
            <img src="{{ asset('img/agua.png')}}" alt="some text" class="img-fluid" >
             </center> 
           
       <br>
       <p>A distribuição da água no Brasil é naturalmente desigual, 
           de modo que justamente as áreas menos povoadas do país é que concentram a maior parte dos recursos hídricos.
            a região Norte, que concentra menos de 7% da população, possui cerca de 68% das reservas hídricas do país, enquanto o Sudeste e o Nordeste,
            regiões mais populosas, apresentam apenas 6% e 3% das reservas, respectivamente.</p>

        </div>

    <div class="container mt-4  shadow-lg rounded text-center" style="background-color:#008000" >
        <hr>       
            <h4><i class="fas fa-recycle"></i> Reciclagem para diminuir problemas de contaminação da água </h4>
       <hr>
       
    </div>
    <div class="container mt-4 p-5 shadow-lg bg-white rounded">
        <h4> Reutilização: Como fazer vela decorativa usando oléo de cozinha usado. </h4>
        <hr>
        <p>O óleo de cozinha usado também pode servir para aromatizar o ambiente. Para fazer uma vela a partir do óleo de cozinha usado, 
        serão necessários:</p>
        <p>•	óleo de cozinha (coado); <br>
            •	parafina;<br>
            •	pavio;<br>
            •	essência (qualquer uma de sua preferência).</p>
          <p>  Comece misturando o óleo na parafina e derretendo ambos em banho-maria. Quando a mistura estiver bem homogênea, acrescente a 
              essência e misture. Coloque tudo no recipiente escolhido para a vela e, antes de esfriar, coloque o pavio no centro da mistura. 
              Depois, é só esperar esfriar e sua vela aromática está pronta!
          </p>

    </div>

    <div class="container mt-4 p-5 shadow-lg bg-white rounded">
       
        <h4> Reutilização: Como fazer sabão caseiro usando oléo de cozinha usado. </h4>
        <hr>
        <p>Uma das formas mais simples de reciclar o óleo de cozinha usado é fazendo sabão caseiro. A parte boa dessa opção é que dá para usar 
            o sabão produzido na limpeza diária do estabelecimento.
            Para preparar o produto, serão necessários:
            </p>
            <p> •	500ml de água; <br>
                •	1 litro de óleo de cozinha (coado); <br>
                •	250g de soda cáustica. <br>
                </p>
            <p>Comece esquentando a água até que ela fique morna. Depois, coloque-a em um recipiente resistente e adicione lentamente a soda cáustica.
             Tenha muito cuidado, pois a reação entre os dois pode provocar pequenas explosões de gases.
              Então misture esses dois ingredientes até que a soda esteja totalmente dissolvida.
            Por fim, adicione o óleo coado e mexa tudo por, aproximadamente, 20 minutos, até obter uma mistura homogênea e consistente.</p>
     </div>
@endsection
