#Informações e padrões do projeto

Esse é um projeto de administração de instalações de sistemas solares.

##Padrão de telas do sistema:
Todas as telas normais do sistema segue o mesmo layout, com um menu de navegação no topo e uma marge de px-48 nas laterais do conteúdo central, todo o resto da página deve ser adicionado dentro dessas margens.

Telas secundárias (login e cadastro) não recebem nenhum padrão pré definido e serão criadas totalmente dentro dos proprios arquivos.

##Padrão de cores do sistema:
As cores principais do sistema são: 
    // Cores Base (Neutras)
    'base-black': '#18181B', // O "quase preto" da Paleta 2 (Fundo Dark / Texto Light)
    'base-white': '#FFFFFF', // O branco puro (Superfície Light)

    // Amarelo (Atenção)
    'attention': '#EAB308', // O amarelo principal da Paleta 2
    'attention-dark': '#D97706', // Um tom mais escuro para hover/bordas
    'attention-light': '#FDE047', // Um tom mais claro para fundos de alerta

    // Verde (Destaque / Primária)
    'highlight': '#22C55E', // Exatamente o verde da Paleta 2
    'highlight-dark': '#16A34A', // Exatamente o hover da Paleta 2
    'highlight-light': '#4ADE80', // O seu tom claro anterior (ótimo para fundos)

    // Cores do Tema Escuro (Grafite)
    'medium': '#27272A', // Fundo de "superfície" (cards) do tema escuro
    'medium-light': '#3F3F46', // Cor de "borda" do tema escuro
    'medium-dark': '#18181B', // Fundo principal do tema escuro (igual ao base-black)

    // --- Cores Adicionais da Paleta 2 (Recomendado) ---
    // Você pode adicionar estas para ter a paleta completa
    
    // Cores de Fundo
    'bg-light': '#FAFAFA', // Fundo principal do tema claro
    'bg-dark': '#18181B', // Fundo principal do tema escuro
    'surface-light': '#FFFFFF', // Fundo de card/sidebar do tema claro
    'surface-dark': '#27272A', // Fundo de card/sidebar do tema escuro

    // Cores de Texto
    'text-light-primary': '#18181B', // Texto principal no tema claro
    'text-light-secondary': '#71717A', // Texto secundário no tema claro
    'text-dark-primary': '#F4F4F5', // Texto principal no tema escuro
    'text-dark-secondary': '#A1A1AA', // Texto secundário no tema escuro

    // Cores de Borda
    'border-light': '#E4E4E7', // Borda no tema claro
    'border-dark': '#3F3F46', // Borda no tema escuro

##Diferença de temas
Todo o site deve seguir a troca de temas entre light e dark. O que implica que todo componente criado deve permitir a troca de temas dele mesmo.

##Funcionamento do sistema
O sistema funciona com as seguintes telas:
Dashboard: Onde ficam todos os graficos e dados rápidos para visualizações de rendimento, além de links de redirecionamento.
Criar Orçamentos: Tela de criações de sistema, que cria sempre com status 1, equivalente a orçamentos. Ela vai usar apenas alguns dos campos da tabela por ser um cadastro inicial.
Instalações: Onde ficam todas as instalações cadastradas, com filtros e buscas. Nela é possível mudar o status de cada instalação, Ao mudar o status um modal aparece pedindo mais dados sobre a instalação para prosseguir par ao proximo status.


Detalhes de sistemas:
Essa tela vai ser dividida quanto ao status atual do sistema visualizado. Todas podem seguir o mesmo esqueleto, mas o dados mostrados vão variar.

Status "Orçamento" (1):
Divida por cards como ja fizemos, mas dessa vez sem imagens, pois trabalharemos com graficos e outros diagramas.
O primeiro card pode ter os dados cadastrais do cliente, bem simples e pequeno (nesse cenário, o endereço pode ficar inteiro).
No lugar do segundo card, faça 3 cards em fila. Eles devem apresentar um ícone grande, a label e o valor para potencia do sistema, consumo do sistema e area do sistema.
No terceiro card, faça os dados de intalaçao: marca, tipo, estrutura, quantidade de modulos, potencia dos modulos, is_Micro, quantiade de micro inversores (apenas se for microinversor). Nesse card, vamos tentar fazer algo diferente. Na direita do card, faça um desenho simples de uma placa usando html, css e svg se necessário. No centro do desneho, deve aparecer o valor da potencia dos módulos, No canto superior esquerdo deve aparecer a quantidade de módulos (x10, x22, x20, por exemplo), no canto inferior no centro deve aparece o tipo de estrutura, no canto superior direito, deve aparecer o nome d amarca dos equipamentos.
No ultimo card, apenas traga os valores por enquanto de total orçado, valor dos materiais orçado e observações do orçamento

Status "Em Instalação" (2):
Nesse caso, a tela fica quase igual a tela do status 1, a unica diferença é que o ultimos card fica ocupando apenas 3/4 da larguda da tela e aparece um novo card ocupando 1/4 na direita dele. Esse card não deve ter padding interno, dve ser apenas uma miniatura estática do orçamento do sistema.


... Mais por vir ...