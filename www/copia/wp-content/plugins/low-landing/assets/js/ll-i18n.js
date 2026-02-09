document.addEventListener('DOMContentLoaded', function () {
    console.log('LL i18n loaded');

    const dictionary = {
        'es': {
            // Header / Nav
            'horario': 'horario de atención: miércoles a domingo',
            'home': 'HOME',
            'quienes_somos': '¿QUIÉNES SOMOS?',
            'contacto': 'CONTACTO',
            'protocolos': 'PROTOCOLOS',
            'servicios': 'SERVICIOS',
            'vuelos': 'VUELOS',

            // Footer
            'logo_parapente': 'LOGO PARAPENTE',
            'footer_desc': 'Tu destino ideal para practicar parapente. Vive la emoción de volar en espectaculares paisajes de montaña',
            'tit_accesos': 'Accesos directos',
            'tit_donde': '¿Dónde encontrarnos?',
            'tit_contacto': 'Contacto',
            'address_text': 'Camino San José de Maipo 7820, Puente alto',
            'footer_center_name': 'Centro de vuelos las vizcachas',
            'footer_bottom_link': 'https://centrovuelosvizcachas.cl/',

            // Hero (Home)
            'tu_aventura': 'TU AVENTURA EMPIEZA EN LAS VIZCACHAS CHILE',

            // Welcome
            'bienvenida_titulo': 'TE DAMOS LA BIENVENIDA AL CENTRO DE VUELO LAS VIZCACHAS DONDE TU EXPERIENCIA SERÁ INOLVIDABLE',
            'bienvenida_subtitulo': 'Tu destino ideal para practicar parapente. Experimenta la emoción de volar en espectaculares paisajes de montaña.',

            // Cards
            'card1_title': 'CONDICIONES PERFECTAS PARA VOLAR',
            'card1_text': 'Los patrones de viento y temperaturas térmicas óptimos hacen que este lugar sea ideal para parapentistas experimentados.',
            'card2_title': 'GRANDIOSOS PAISAJES',
            'card2_text': 'Vuele sobre impresionantes cadenas montañosas, valles y una belleza natural impresionante.',
            'card3_title': 'LUGAR PARA EXPERTOS',
            'card3_text': 'Lugar reconocido por las comunidades de parapente como un destino de vuelo de primer nivel.',

            // Destination
            'destino_titulo': 'TU DESTINO DEFINITIVO PARA EL PARAPENTE',
            'destino_desc': 'El Centro de Vuelo Las Vizcachas da la bienvenida a parapentistas experimentados de todo el mundo. Nuestra ubicacion ofrece condiciones de vuelo excepcionales, impresionantes paisajes montanosos y una comunidad solidaria que hace que cada vuelo sea inolvidable.',

            // Seasons
            'temporadas_label': 'TEMPORADAS',
            'temporadas_titulo': 'CONOCE LAS TEMPORADAS PERFECTAS PARA VOLAR',
            'temp_alta_label': 'TEMPORADA ALTA',
            'temp_alta_val': 'Septiembre - Marzo',
            'temp_baja_label': 'TEMPORADA BAJA',
            'temp_baja_val': 'Abril - Agosto',
            'clima_titulo': 'REVISA EL CLIMA DE LOS PRÓXIMOS DÍAS',

            // Tracks
            'tracks_label': 'TRACKS DE VUELOS',
            'tracks_titulo': 'AQUÍ PUEDES VER UN PAR DE VUELOS HECHOS EN EL CENTRO DE VUELO',
            'tracks_desc': '¿QUIERES SEGUIR VIENDO EXPERIENCIAS DE VUELOS?',
            'ver_mas': 'Ver más',

            // Hero CTA
            'hero2_pre': 'Comienza ahora',
            'hero2_title': '¿Listo para volar?',
            'hero2_desc': 'Ya sea un piloto experimentado que busca su próxima aventura o que está explorando nuestros servicios, estamos aquí para hacer que su experiencia de parapente sea excepcional.',

            // Services Page
            'serv_hero_1': 'VUELOS BIPLAZA: TU AVENTURA COMIENZA EN EL AIRE',
            'services_label': 'SERVICIOS',
            'serv_info_title': '¿NO ERES PARAPENTISTA Y TE GUSTARÍA VIVIR UNA EXPERIENCIA ÚNICA DE VOLAR?',
            'serv_info_desc1': 'Vive la experiencia de volar hoy junto a nuestro equipo experto y confiable.',
            'serv_info_desc2': 'En Centro de Vuelo Las Vizcachas, realizamos vuelos biplaza con los más altos estándares, ofrecemos atención personalizada y fomentamos un turismo responsable. Garantizamos emoción, confianza y profesionalismo en cada vuelo.',

            'feat1_title': 'Profesional certificado',
            'feat1_desc': 'Instructores certificados con años de experiencia .',
            'feat2_title': 'No se necesita experiencia',
            'feat2_desc': 'Perfecto para cualquier persona.',
            'feat3_title': 'Atención personalizada',
            'feat3_desc': 'Orientación personalizada durante toda su experiencia de vuelo.',

            'serv_two_title': 'DOS FORMAS DE VIVIR EL CIELO',
            'serv_two_sub': 'Ya sea tu primer vuelo o una nueva travesía, tenemos la experiencia perfecta para ti.',
            'serv_two_desc': 'Ven a volar junto a un piloto certificado en un emocionante vuelo biplaza, o accede como parapentista independiente para disfrutar de este increíble punto de despegue.',

            'serv_opt1_title': 'ACCESO PARA PARAPENTISTAS CERTIFICADOS',
            'serv_opt1_text': 'Disfruta del despegue y recorrido por tu cuenta en este punto de vuelo autorizado, ideal para parapentistas con licencia que quieren volar libremente.',
            'serv_opt1_li1': 'Acceso al sitio de vuelo',
            'serv_opt1_li2': 'Para pilotos certificados',
            'serv_opt1_li3': 'Vuelo independiente',
            'serv_opt1_price': 'Valor: $10.000',

            'serv_opt2_title': 'VUELA CON UN PILOTO CERTIFICADO',
            'serv_opt2_text': 'Experimenta la emoción de volar sin preocuparte por nada: un piloto experto te acompañará en cada despegue y aterrizaje.',
            'serv_opt2_li1': 'Grabación en GoPro incluida',
            'serv_opt2_li2': 'Experiencia segura y guiada',
            'serv_opt2_price': 'Valor: $65.000',

            'serv_exp_title': 'REVISA NUESTRAS EXPERIENCIAS EN EL CENTRO DE VUELO',
            'serv_exp_sub': 'Encuentra experiencias únicas con centro de vuelo las vizcachas',

            // Location
            'loc_titulo': '¿Cómo llegar al Centro de Vuelo Las Vizcachas?',
            'loc_addr': 'Dirección: San José de Maipo 07820, Puente Alto',
            'loc_phone': 'Teléfonos: (+56 9) 6216 9374',

            // Experiences
            'exp_label': 'SIGUE CON NUEVAS AVENTURAS',
            'exp_title': 'OTROS LUGARES: EXPLORA, DISFRUTA Y DESCUBRE UNA NUEVA EXPERIENCIA.',
            'exp_desc': 'Encuentra experiencias únicas, rutas de senderismo, hospedajes encantadores y sabores locales. Todo el turismo que buscas.',
            'card_hosp_title': 'Hospedaje',
            'card_hosp_text': 'Descubre hospedajes únicos en cada destino. Vive la experiencia local y siéntete como en casa, ondequiera que viajes.',
            'card_rest_title': 'Restaurantes',
            'card_rest_text': 'Explore el mundo a través de sus sabores. De la cocina tradicional a la gourmet, cada plato es una nueva aventura.',
            'card_atr_title': 'Atractivos',
            'card_atr_text': 'Descubre la magia de cada destino. Explora paisajes, culturas y tradiciones que te dejarán sin aliento.',
            'card_act_title': 'Actividades',
            'card_act_text': 'Vive la emoción de cada destino. Desde deportes extremos hasta actividades culturales, ¡hay una aventura para todos!',

            'footer_text': 'Y MUCHO MÁS AQUÍ EN CAJON DEL MAIPO',
            'footer_link': 'Ir',

            // Contacto Page
            'cont_hero_1': 'TU OPINÓN',
            'cont_hero_2': 'NOS IMPORTA',
            'cont_hero_3': 'CUÉNTANOS TU',
            'cont_hero_4': 'EXPERIENCIA',
            'cont_panel_title': '¡CONVERSEMOS!',
            'cont_panel_subtitle': '¡Llámanos o Escríbenos a whatsapp!',
            'cont_panel_follow': '¡Síguenos en Instagram!',

            // Protocolos Page
            'prot_hero_1': 'INFORMACIÓN',
            'prot_hero_2': 'IMPORTANTE',
            'prot_hero_3': ': PROTOCOLOS PARA LA EXPERIENCIA',
            'prot_list_title': 'REVISA NUESTROS PROTOCOLOS',
            'prot_label_es': 'Protocolos en Español',
            'prot_label_en': 'Protocolos en Ingles',
            'prot_card_1': 'Ficha tecnica de la actividas',
            'prot_card_2': 'Plan de prevención y manejo de riesgos',
            'prot_card_3': 'Plan de respuesta frente a situaciones de emergencia',
            'prot_card_en_1': 'Technical data sheet exercise',
            'prot_card_en_2': 'Plan of management of prevention of risk',
            'prot_card_en_3': 'Response plan for emergency situation',
            'prot_banner_title': 'ESPERAMOS QUE DISFRUTES TU VIAJE EN EL CENTRO DE VUELO LAS VIZCACHAS',
            'prot_banner_sub': 'El mejor centro de vuelo para vivir nuevas emociones',

            // Quienes Page
            'quienes_hero_1': 'CENTRO DE VUELO',
            'quienes_hero_2': 'LAS VIZCACHAS',
            'quienes_exp_badge': 'AÑOS DE EXPERIENCIA',
            'quienes_about_eyebrow': 'SOBRE NOSOTROS',
            'quienes_about_title': 'Experiencia, confianza y calidad en el aire',
            'quienes_about_text1': 'Con más de 25 años de experiencia en vuelos comerciales, somos un equipo apasionado por el aire y la libertad de volar. Nos dedicamos a ofrecer experiencias de parapente únicas, y memorables, elevando los estándares del turismo aéreo en Chile.',
            'quienes_about_text2': 'Cumplimos con todas las normativas de SERNATUR y la Dirección General de Aeronáutica Civil.',
            'quienes_vive_title': 'VIVE CON NOSOTROS LA EMOCIÓN DE VOLAR Y DESCUBRE UNA NUEVA FORMA DE DISFRUTAR EL PAISAJE DESDE LAS ALTURAS.',
            'quienes_vive_sub': 'Aprobados por SERNATUR',
            'quienes_asegura_title': 'POR QUE NOS ASEGURAMOS QUE TU EXPERIENCIA SEA REALMENTE BUENA',
            'quienes_card1_title': 'LICENCIAS AL DÍA',
            'quienes_card1_text': 'Cada piloto con el que vives tu experiencia tiene licencia al día.',
            'quienes_card2_title': 'PRIMEROS AUXILIOS',
            'quienes_card2_text': 'Cada piloto cuenta con un curso de Primeros Auxilios actualizado.',
            'quienes_card3_title': 'CLAROS Y OPORTUNOS',
            'quienes_card3_text': 'Nos preocupamos de dar toda la información sobre la experiencia de forma clara y oportuna al pasajero.',
            'quienes_check_proto': 'Puedes revisar nuestros protocolos aquí',
            'colaboradores': 'Colaboradores',
        },
        'en': {
            'horario': 'Opening hours: Wednesday to Sunday',
            'home': 'HOME',
            'quienes_somos': 'WHO WE ARE',
            'contacto': 'CONTACT',
            'protocolos': 'PROTOCOLS',
            'servicios': 'SERVICES',
            'vuelos': 'FLIGHTS',

            'logo_parapente': 'PARAGLIDING LOGO',
            'footer_desc': 'Your ideal destination for paragliding. Experience the thrill of flying in spectacular mountain landscapes.',
            'tit_accesos': 'Quick links',
            'tit_donde': 'Where to find us?',
            'tit_contacto': 'Contact',
            'address_text': 'San José de Maipo Road 7820, Puente Alto',
            'footer_center_name': 'Las Vizcachas Flight Center',
            'footer_bottom_link': 'https://centrovuelosvizcachas.cl/',

            'tu_aventura': 'YOUR ADVENTURE STARTS AT VIZCACHAS CHILE',

            'bienvenida_titulo': 'WELCOME TO LAS VIZCACHAS FLIGHT CENTER WHERE YOUR EXPERIENCE WILL BE UNFORGETTABLE',
            'bienvenida_subtitulo': 'Your ideal destination for paragliding. Experience the thrill of flying in spectacular mountain landscapes.',

            'card1_title': 'PERFECT CONDITIONS FOR FLYING',
            'card1_text': 'Optimal wind patterns and thermal temperatures make this place ideal for experienced paragliders.',
            'card2_title': 'GREAT LANDSCAPES',
            'card2_text': 'Fly over impressive mountain ranges, valleys and stunning natural beauty.',
            'card3_title': 'PLACE FOR EXPERTS',
            'card3_text': 'Recognized by paragliding communities as a premier flying destination.',

            'destino_titulo': 'YOUR ULTIMATE DESTINATION FOR PARAGLIDING',
            'destino_desc': 'Las Vizcachas Flight Center welcomes experienced paragliders from around the world. Our location offers exceptional flying conditions, stunning mountain landscapes and a supportive community that makes every flight unforgettable.',

            'temporadas_label': 'SEASONS',
            'temporadas_titulo': 'KNOW THE PERFECT SEASONS TO FLY',
            'temp_alta_label': 'HIGH SEASON',
            'temp_alta_val': 'September - March',
            'temp_baja_label': 'LOW SEASON',
            'temp_baja_val': 'April - August',
            'clima_titulo': 'CHECK THE WEATHER FOR THE NEXT DAYS',

            'tracks_label': 'FLIGHT TRACKS',
            'tracks_titulo': 'HERE YOU CAN SEE A COUPLE OF FLIGHTS MADE AT THE FLIGHT CENTER',
            'tracks_desc': 'DO YOU WANT TO CONTINUE SEEING FLIGHT EXPERIENCES?',
            'ver_mas': 'See more',

            'hero2_pre': 'Start now',
            'hero2_title': 'Ready to fly?',
            'hero2_desc': 'Whether you are an experienced pilot looking for your next adventure or exploring our services, we are here to make your paragliding experience exceptional.',

            'serv_hero_1': 'TANDEM FLIGHTS: YOUR ADVENTURE STARTS IN THE AIR',
            'services_label': 'SERVICES',
            'serv_info_title': 'ARE YOU NOT A PARAGLIDER AND WOULD LIKE TO LIVE A UNIQUE FLYING EXPERIENCE?',
            'serv_info_desc1': 'Live the experience of flying today with our expert and reliable team.',
            'serv_info_desc2': 'At Las Vizcachas Flight Center, we perform tandem flights with the highest standards, offer personalized attention and promote responsible tourism. We guarantee excitement, confidence and professionalism in every flight.',

            'feat1_title': 'Certified Professional',
            'feat1_desc': 'Certified instructors with years of experience.',
            'feat2_title': 'No experience needed',
            'feat2_desc': 'Perfect for anyone.',
            'feat3_title': 'Personalized attention',
            'feat3_desc': 'Personalized guidance throughout your flight experience.',

            'serv_two_title': 'TWO WAYS TO LIVE THE SKY',
            'serv_two_sub': 'Whether it\'s your first flight or a new journey, we have the perfect experience for you.',
            'serv_two_desc': 'Come fly with a certified pilot in an exciting tandem flight, or access as an independent paraglider to enjoy this incredible takeoff point.',

            'serv_opt1_title': 'ACCESS FOR CERTIFIED PARAGLIDERS',
            'serv_opt1_text': 'Enjoy the takeoff and tour on your own at this authorized flight point, ideal for licensed paragliders who want to fly freely.',
            'serv_opt1_li1': 'Access to the flight site',
            'serv_opt1_li2': 'For certified pilots',
            'serv_opt1_li3': 'Independent flight',
            'serv_opt1_price': 'Price: $10.000',

            'serv_opt2_title': 'FLY WITH A CERTIFIED PILOT',
            'serv_opt2_text': 'Experience the thrill of flying without worrying about anything: an expert pilot will accompany you in every takeoff and landing.',
            'serv_opt2_li1': 'GoPro recording included',
            'serv_opt2_li2': 'Safe and guided experience',
            'serv_opt2_price': 'Price: $65.000',

            'serv_exp_title': 'CHECK OUR EXPERIENCES AT THE FLIGHT CENTER',
            'serv_exp_sub': 'Find unique experiences with Las Vizcachas Flight Center',

            'loc_titulo': 'How to get to Las Vizcachas Flight Center?',
            'loc_addr': 'Address: San José de Maipo 07820, Puente Alto',
            'loc_phone': 'Phones: (+56 9) 6216 9374',

            'exp_label': 'CONTINUE WITH NEW ADVENTURES',
            'exp_title': 'OTHER PLACES: EXPLORE, ENJOY AND DISCOVER A NEW EXPERIENCE.',
            'exp_desc': 'Find unique experiences, hiking trails, charming lodgings and local flavors. All the tourism you are looking for.',
            'card_hosp_title': 'Lodging',
            'card_hosp_text': 'Discover unique lodgings in every destination. Live the local experience and feel at home, wherever you travel.',
            'card_rest_title': 'Restaurants',
            'card_rest_text': 'Explore the world through its flavors. From traditional to gourmet cuisine, every dish is a new adventure.',
            'card_atr_title': 'Tourist Attractions',
            'card_atr_text': 'Discover the magic of every destination. Explore landscapes, cultures and traditions that will leave you breathless.',
            'card_act_title': 'Activities',
            'card_act_text': 'Live the excitement of every destination. From extreme sports to cultural activities, there is an adventure for everyone!',

            'footer_text': 'AND MUCH MORE HERE IN CAJON DEL MAIPO',
            'footer_link': 'Go',

            'cont_hero_1': 'YOUR OPINION',
            'cont_hero_2': 'MATTERS TO US',
            'cont_hero_3': 'TELL US YOUR',
            'cont_hero_4': 'EXPERIENCE',
            'cont_panel_title': 'LET\'S TALK!',
            'cont_panel_subtitle': 'Call us or write us on WhatsApp!',
            'cont_panel_follow': 'Follow us on Instagram!',

            'prot_hero_1': 'INFORMATION',
            'prot_hero_2': 'IMPORTANT',
            'prot_hero_3': ': PROTOCOLOS FOR THE EXPERIENCE',
            'prot_list_title': 'CHECK OUR PROTOCOLS',
            'prot_label_es': 'Protocols in Spanish',
            'prot_label_en': 'Protocols in English',
            'prot_card_1': 'Technical activity sheet',
            'prot_card_2': 'Risk prevention and management plan',
            'prot_card_3': 'Response plan for emergency situations',
            'prot_card_en_1': 'Technical data sheet exercise',
            'prot_card_en_2': 'Plan of management of prevention of risk',
            'prot_card_en_3': 'Response plan for emergency situation',
            'prot_banner_title': 'WE HOPE YOU ENJOY YOUR TRIP AT LAS VIZCACHAS FLIGHT CENTER',
            'prot_banner_sub': 'The best flight center to experience new emotions',

            'quienes_hero_1': 'FLIGHT CENTER',
            'quienes_hero_2': 'LAS VIZCACHAS',
            'quienes_exp_badge': 'YEARS OF EXPERIENCE',
            'quienes_about_eyebrow': 'ABOUT US',
            'quienes_about_title': 'Experience, trust and quality in the air',
            'quienes_about_text1': 'With over 25 years of experience in commercial flights, we are a team passionate about the air and the freedom of flying. We dedicate ourselves to offering unique and memorable paragliding experiences, raising the standards of aerial tourism in Chile.',
            'quienes_about_text2': 'We comply with all SERNATUR regulations and the General Directorate of Civil Aeronautics.',
            'quienes_vive_title': 'LIVE THE THRILL OF FLYING WITH US AND DISCOVER A NEW WAY TO ENJOY THE LANDSCAPE FROM THE HEIGHTS.',
            'quienes_vive_sub': 'Approved by SERNATUR',
            'quienes_asegura_title': 'WHY WE ENSURE YOUR EXPERIENCE IS REALLY GOOD',
            'quienes_card1_title': 'CURRENT LICENSES',
            'quienes_card1_text': 'Every pilot you fly with has a current license.',
            'quienes_card2_title': 'FIRST AID',
            'quienes_card2_text': 'Every pilot has an updated First Aid course.',
            'quienes_card3_title': 'CLEAR AND TIMELY',
            'quienes_card3_text': 'We care about giving all information about the experience clearly and timely to the passenger.',
            'quienes_check_proto': 'You can check our protocols here',
            'colaboradores': 'Collaborators',
        },
        'pt': {
            'horario': 'Horário de atendimento: quarta a domingo',
            'home': 'INÍCIO',
            'quienes_somos': 'QUEM SOMOS?',
            'contacto': 'CONTATO',
            'protocolos': 'PROTOCOLOS',
            'servicios': 'SERVIÇOS',
            'vuelos': 'VOOS',

            'logo_parapente': 'LOGO PARAPENTE',
            'footer_desc': 'Seu destino ideal para praticar parapente. Viva a emoção de voar em paisagens montanhosas espetaculares',
            'tit_accesos': 'Links rápidos',
            'tit_donde': 'Onde nos encontrar?',
            'tit_contacto': 'Contato',
            'address_text': 'Estrada San José de Maipo 7820, Puente Alto',
            'footer_center_name': 'Centro de Voos Las Vizcachas',
            'footer_bottom_link': 'https://centrovuelosvizcachas.cl/',

            'tu_aventura': 'SUA AVENTURA COMEÇA NAS VIZCACHAS CHILE',

            'bienvenida_titulo': 'SEJA BEM-VINDO AO CENTRO DE VOO LAS VIZCACHAS ONDE SUA EXPERIÊNCIA SERÁ INESQUECÍVEL',
            'bienvenida_subtitulo': 'Seu destino ideal para praticar parapente. Experimente a emoção de voar em paisagens montanhosas espetaculares.',

            'card1_title': 'CONDIÇÕES PERFEITAS PARA VOAR',
            'card1_text': 'Os padrões de vento e temperaturas térmicas ideais tornam este lugar ideal para parapentistas experientes.',
            'card2_title': 'GRANDIOSAS PAISAGENS',
            'card2_text': 'Voe sobre impressionantes cadeias de montanhas, vales e uma beleza natural impressionante.',
            'card3_title': 'LUGAR PARA EXPERTS',
            'card3_text': 'Lugar reconhecido pelas comunidades de parapente como um destino de voo de primeiro nível.',

            'destino_titulo': 'SEU DESTINO DEFINITIVO PARA O PARAPENTE',
            'destino_desc': 'O Centro de Voo Las Vizcachas dá as boas-vindas a parapentistas experientes de todo o mundo. Nossa localização oferece condições de voo excepcionais, impressionantes paisagens montanhosas e uma comunidade solidária que torna cada voo inesquecível.',

            'temporadas_label': 'TEMPORADAS',
            'temporadas_titulo': 'CONHEÇA AS TEMPORADAS PERFEITAS PARA VOAR',
            'temp_alta_label': 'ALTA TEMPORADA',
            'temp_alta_val': 'Setembro - Março',
            'temp_baja_label': 'BAIXA TEMPORADA',
            'temp_baja_val': 'Abril - Agosto',
            'clima_titulo': 'CONFIRA O CLIMA DOS PRÓXIMOS DIAS',

            'tracks_label': 'TRACKS DE VOOS',
            'tracks_titulo': 'AQUI VOCÊ PODE VER ALGUNS VOOS FEITOS NO CENTRO DE VOO',
            'tracks_desc': 'QUER CONTINUAR VENDO EXPERIÊNCIAS DE VOOS?',
            'ver_mas': 'Ver mais',

            'hero2_pre': 'Comece agora',
            'hero2_title': 'Pronto para voar?',
            'hero2_desc': 'Seja um piloto experiente procurando sua próxima aventura ou explorando nossos serviços, estamos aqui para tornar sua experiência de parapente excepcional.',

            'serv_hero_1': 'VOOS DUPLOS: SUA AVENTURA COMEÇA NO AR',
            'services_label': 'SERVIÇOS',
            'serv_info_title': 'NÃO É PARAPENTISTA E GOSTARIA DE VIVER UMA EXPERIÊNCIA ÚNICA DE VOAR?',
            'serv_info_desc1': 'Viva a experiência de voar hoje junto a nossa equipe especialista e confiável.',
            'serv_info_desc2': 'No Centro de Voo Las Vizcachas, realizamos voos duplos com os mais altos padrões, oferecemos atendimento personalizado e fomentamos um turismo responsável. Garantimos emoção, confiança e profissionalismo em cada voo.',

            'feat1_title': 'Profissional certificado',
            'feat1_desc': 'Instrutores certificados com anos de experiência.',
            'feat2_title': 'Não é necessária experiência',
            'feat2_desc': 'Perfeito para qualquer pessoa.',
            'feat3_title': 'Atendimento personalizado',
            'feat3_desc': 'Orientação personalizada durante toda sua experiência de voo.',

            'serv_two_title': 'DUAS FORMAS DE VIVER O CÉU',
            'serv_two_sub': 'Seja seu primeiro voo ou uma nova jornada, temos a experiência perfeita para você.',
            'serv_two_desc': 'Venha voar com um piloto certificado em um emocionante voo duplo, ou acesse como parapentista independente para desfrutar deste incrível ponto de decolagem.',

            'serv_opt1_title': 'ACESSO PARA PARAPENTISTAS CERTIFICADOS',
            'serv_opt1_text': 'Desfrute da decolagem e percurso por conta própria neste ponto de voo autorizado, ideal para parapentistas com licença que querem voar livremente.',
            'serv_opt1_li1': 'Acesso ao local de voo',
            'serv_opt1_li2': 'Para pilotos certificados',
            'serv_opt1_li3': 'Voo independente',
            'serv_opt1_price': 'Valor: $10.000',

            'serv_opt2_title': 'VOE COM UM PILOTO CERTIFICADO',
            'serv_opt2_text': 'Experimente a emoção de voar sem se preocupar com nada: um piloto experiente o acompanhará em cada decolagem e aterrissagem.',
            'serv_opt2_li1': 'Gravação GoPro incluída',
            'serv_opt2_li2': 'Experiência segura e guiada',
            'serv_opt2_price': 'Valor: $65.000',

            'serv_exp_title': 'CONFIRA NOSSAS EXPERIÊNCIAS NO CENTRO DE VOO',
            'serv_exp_sub': 'Encontre experiências únicas com o centro de voo las vizcachas',

            'loc_titulo': 'Como chegar ao Centro de Voo Las Vizcachas?',
            'loc_addr': 'Endereço: Calle San José de Maipo 07820, Puente Alto',
            'loc_phone': 'Telefones: (+56 9) 6216 9374',

            'exp_label': 'CONTINUE COM NOVAS AVENTURAS',
            'exp_title': 'OUTROS LUGARES: EXPLORE, DESFRUTE E DESCUBRA UMA NOVA EXPERIÊNCIA.',
            'exp_desc': 'Encontre experiências únicas, trilhas, hospedagens encantadoras e sabores locais. Todo o turismo que você procura.',
            'card_hosp_title': 'Hospedagem',
            'card_hosp_text': 'Descubra hospedagens únicas em cada destino. Viva a experiência local e sinta-se em casa, onde quer que viaje.',
            'card_rest_title': 'Restaurantes',
            'card_rest_text': 'Explore o mundo através de seus sabores. Da cozinha tradicional à gourmet, cada prato é uma nova aventura.',
            'card_atr_title': 'Atrações Turísticas',
            'card_atr_text': 'Descubra a magia de cada destino. Explore paisagens, culturas e tradições que te deixarão sem fôlego.',
            'card_act_title': 'Atividades',
            'card_act_text': 'Viva a emoção de cada destino. De esportes radicais a atividades culturais, há uma aventura para todos!',

            'footer_text': 'E MUITO MAIS AQUI NO CAJON DEL MAIPO',
            'footer_link': 'Ir',

            'cont_hero_1': 'SUA OPINÃO',
            'cont_hero_2': 'NOS IMPORTA',
            'cont_hero_3': 'CONTE-NOS SUA',
            'cont_hero_4': 'EXPERIÊNCIA',
            'cont_panel_title': 'VAMOS CONVERSAR!',
            'cont_panel_subtitle': 'Ligue para nós ou escreva no WhatsApp!',
            'cont_panel_follow': 'Siga-nos no Instagram!',

            'prot_hero_1': 'INFORMAÇÃO',
            'prot_hero_2': 'IMPORTANTE',
            'prot_hero_3': ': PROTOCOLOS PARA A EXPERIÊNCIA',
            'prot_list_title': 'CONFIRA NOSSOS PROTOCOLOS',
            'prot_label_es': 'Protocolos em Espanhol',
            'prot_label_en': 'Protocolos em Inglês',
            'prot_card_1': 'Ficha técnica da atividade',
            'prot_card_2': 'Plano de prevenção e gestão de riscos',
            'prot_card_3': 'Plano de resposta a situações de emergência',
            'prot_card_en_1': 'Technical data sheet exercise',
            'prot_card_en_2': 'Plan of management of prevention of risk',
            'prot_card_en_3': 'Response plan for emergency situation',
            'prot_banner_title': 'ESPERAMOS QUE VOCÊ APROVEITE SUA VIAGEM NO CENTRO DE VOO LAS VIZCACHAS',
            'prot_banner_sub': 'O melhor centro de voo para viver novas emoções',

            'quienes_hero_1': 'CENTRO DE VOO',
            'quienes_hero_2': 'LAS VIZCACHAS',
            'quienes_exp_badge': 'ANOS DE EXPERIÊNCIA',
            'quienes_about_eyebrow': 'SOBRE NÓS',
            'quienes_about_title': 'Experiência, confiança e qualidade no ar',
            'quienes_about_text1': 'Com mais de 25 anos de experiência em voos comerciais, somos uma equipe apaixonada pelo ar e pela liberdade de voar. Dedicamo-nos a oferecer experiências de parapente únicas e memoráveis, elevando os padrões do turismo aéreo no Chile.',
            'quienes_about_text2': 'Cumprimos todas as normas do SERNATUR e da Direção Geral de Aeronáutica Civil.',
            'quienes_vive_title': 'VIVA CONOSCO A EMOÇÃO DE VOAR E DESCUBRA UMA NOVA FORMA DE APRECIAR A PAISAGEM LÁ DO ALTO.',
            'quienes_vive_sub': 'Aprovados pelo SERNATUR',
            'quienes_asegura_title': 'POR QUE NOS CERTIFICAMOS QUE SUA EXPERIÊNCIA SEJA REALMENTE BOA',
            'quienes_card1_title': 'LICENÇAS EM DIA',
            'quienes_card1_text': 'Cada piloto com quem você vive sua experiência tem licença em dia.',
            'quienes_card2_title': 'PRIMEIROS SOCORROS',
            'quienes_card2_text': 'Cada piloto possui um curso de Primeiros Socorros atualizado.',
            'quienes_card3_title': 'CLAROS E OPORTUNOS',
            'quienes_card3_text': 'Nos preocupamos em dar todas as informações sobre a experiência de forma clara e oportuna ao passageiro.',
            'quienes_check_proto': 'Você pode conferir nossos protocolos aqui',
            'colaboradores': 'Colaboradores',
        }
    };

    /** A map of CSS selectors or text-content matchers to dictionary keys */
    const mapping = [
        // ==========================================
        // COMMON (Header/Footer/Nav)
        // ==========================================
        { selector: '.ll-topbar__text', key: 'horario' },

        { selector: 'a[href$="/"]', match: 'HOME', key: 'home', type: 'text' },
        { selector: 'a[href*="quienes-somos"]', match: 'QUIÉNES', key: 'quienes_somos', type: 'text' },
        { selector: 'a[href*="contacto"]', match: 'CONTACTO', key: 'contacto', type: 'text' },
        { selector: 'a[href*="protocolos"]', match: 'PROTOCOLOS', key: 'protocolos', type: 'text' },
        { selector: 'a[href*="servicios"]', match: 'SERVICIOS', key: 'servicios', type: 'text' },
        { selector: 'a[href*="vuelos"]', match: 'VUELOS', key: 'vuelos', type: 'text' },

        { selector: '.ll-footer__logo', key: 'logo_parapente' },
        { selector: '.ll-footer__description', key: 'footer_desc' },
        { selector: '.ll-footer__col-title', match: 'Accesos', key: 'tit_accesos' },
        { selector: '.ll-footer__col-title', match: 'encontrarnos', key: 'tit_donde' },
        { selector: '.ll-footer__col-title', match: 'Contacto', key: 'tit_contacto' },
        { selector: '.ll-footer__address-text', key: 'address_text' },
        { selector: '.ll-footer__contact-list span', match: 'Centro de vuelos', key: 'footer_center_name' },

        // ==========================================
        // HERO (HOME)
        // ==========================================
        {
            selector: '.ll-adventure__headline',
            match: 'TU',
            key: 'tu_aventura',
        },

        // ==========================================
        // CONTACTO (Page)
        // ==========================================
        { selector: '.ll-contacto__hero-title--accent', match: 'OPINÓN', key: 'cont_hero_1' },
        { selector: '.ll-contacto__hero-title--light', match: 'IMPORTA', key: 'cont_hero_2' },
        { selector: '.ll-contacto__hero-foot--accent', match: 'CUÉNTANOS', key: 'cont_hero_3' },
        { selector: '.ll-contacto__hero-foot--light', match: 'EXPERIENCIA', key: 'cont_hero_4' },

        { selector: '.ll-contacto__heading', match: 'CONVERSEMOS', key: 'cont_panel_title' },
        { selector: '.ll-contacto__lead', match: 'Llámanos', key: 'cont_panel_subtitle' },
        { selector: '.ll-contacto__lead--spaced', match: 'Síguenos', key: 'cont_panel_follow' },

        // ==========================================
        // PROTOCOLOS (Page)
        // ==========================================
        { selector: '.ll-adventure__headline', match: 'INFORMACIÓN', key: 'prot_hero_1' },
        { selector: '.ll-adventure__headline--accent', match: 'IMPORTANTE', key: 'prot_hero_2' },
        { selector: '.ll-adventure__headline', match: 'PROTOCOLOS', key: 'prot_hero_3', type: 'partial' },

        { selector: '.ll-protocols__title', key: 'prot_list_title' },
        { selector: '.ll-protocols__label', match: 'Español', key: 'prot_label_es' },
        { selector: '.ll-protocols__label', match: 'Ingles', key: 'prot_label_en' },

        { selector: '.ll-protocols-card__text', match: 'Ficha tecnica', key: 'prot_card_1' },
        { selector: '.ll-protocols-card__text', match: 'prevención', key: 'prot_card_2' },
        { selector: '.ll-protocols-card__text', match: 'emergencia', key: 'prot_card_3' },

        { selector: '.ll-protocols-card__text', match: 'Technical data', key: 'prot_card_en_1' },
        { selector: '.ll-protocols-card__text', match: 'Plan of management', key: 'prot_card_en_2' },
        { selector: '.ll-protocols-card__text', match: 'Response plan', key: 'prot_card_en_3' },

        { selector: '.ll-disfruta__title', key: 'prot_banner_title' },
        { selector: '.ll-disfruta__subtitle', key: 'prot_banner_sub' },

        // ==========================================
        // QUIENES SOMOS (Page)
        // ==========================================
        { selector: '.ll-quienes__headline', match: 'CENTRO DE', key: 'quienes_hero_1', custom: true },
        { selector: '.ll-quienes__headline', match: 'VIZCACHAS', key: 'quienes_hero_2' },

        { selector: '.ll-union__badge-text', key: 'quienes_exp_badge' },
        { selector: '.ll-union__eyebrow', key: 'quienes_about_eyebrow' },
        { selector: '.ll-union__title', key: 'quienes_about_title' },
        { selector: '.ll-union__text', match: '25 años', key: 'quienes_about_text1' },
        { selector: '.ll-union__text', match: 'normativas', key: 'quienes_about_text2' },
        { selector: '.ll-union__cta', key: 'ver_mas' },

        { selector: '.ll-vive__title', key: 'quienes_vive_title' },
        { selector: '.ll-vive__subtitle', key: 'quienes_vive_sub' },

        { selector: '.ll-asegura__title', key: 'quienes_asegura_title' },
        { selector: '.ll-asegura-card__title', match: 'LICENCIAS', key: 'quienes_card1_title' },
        { selector: '.ll-asegura-card__text', match: 'licencia', key: 'quienes_card1_text' },
        { selector: '.ll-asegura-card__title', match: 'AUXILIOS', key: 'quienes_card2_title' },
        { selector: '.ll-asegura-card__text', match: 'Primeros Auxilios', key: 'quienes_card2_text' },
        { selector: '.ll-asegura-card__title', match: 'OPORTUNOS', key: 'quienes_card3_title' },
        { selector: '.ll-asegura-card__text', match: 'información', key: 'quienes_card3_text' },

        { selector: '.ll-asegura__link', key: 'quienes_check_proto' },
        { selector: '.ll-asegura__cta', key: 'ver_mas' },

        { selector: '.ll-collab__title', key: 'colaboradores' },

        // ==========================================
        // SERVICIOS (Page)
        // ==========================================
        { selector: '.ll-adventure__headline', match: 'VUELOS', key: 'serv_hero_1', custom: true },

        { selector: '.ll-services__label', key: 'services_label' },
        { selector: '.ll-services__title', key: 'serv_info_title' },
        { selector: '.ll-services__description', match: 'Vive la experiencia', key: 'serv_info_desc1' },
        { selector: '.ll-services__description', match: 'En Centro de Vuelo', key: 'serv_info_desc2' },

        { selector: '.ll-feature__title', match: 'Profesional', key: 'feat1_title' },
        { selector: '.ll-feature__subtitle', match: 'Instructores', key: 'feat1_desc' },
        { selector: '.ll-feature__title', match: 'No se necesita', key: 'feat2_title' },
        { selector: '.ll-feature__subtitle', match: 'Perfecto', key: 'feat2_desc' },
        { selector: '.ll-feature__title', match: 'Atención', key: 'feat3_title' },
        { selector: '.ll-feature__subtitle', match: 'Orientación', key: 'feat3_desc' },
        { selector: '.ll-services__cta', key: 'ver_mas' },

        { selector: '.ll-two-ways__title', key: 'serv_two_title' },
        { selector: '.ll-two-ways__subtitle', key: 'serv_two_sub' },
        { selector: '.ll-two-ways__description', key: 'serv_two_desc' },

        { selector: '.ll-flight-option__title', match: 'ACCESO', key: 'serv_opt1_title' },
        { selector: '.ll-flight-option__text', match: 'Disfruta', key: 'serv_opt1_text' },
        { selector: '.ll-flight-option__list li', match: 'Acceso', key: 'serv_opt1_li1' },
        { selector: '.ll-flight-option__list li', match: 'Para pilotos', key: 'serv_opt1_li2' },
        { selector: '.ll-flight-option__list li', match: 'Vuelo independiente', key: 'serv_opt1_li3' },
        { selector: '.ll-flight-option__price', match: 'Valor: $10.000', key: 'serv_opt1_price' },

        { selector: '.ll-flight-option__title', match: 'VUELA', key: 'serv_opt2_title' },
        { selector: '.ll-flight-option__text', match: 'Experimenta', key: 'serv_opt2_text' },
        { selector: '.ll-flight-option__list li', match: 'GoPro', key: 'serv_opt2_li1' },
        { selector: '.ll-flight-option__list li', match: 'Experiencia', key: 'serv_opt2_li2' },
        { selector: '.ll-flight-option__price', match: 'Valor: $65.000', key: 'serv_opt2_price' },

        { selector: '.ll-experiences__title', key: 'serv_exp_title' },
        { selector: '.ll-experiences__subtitle', key: 'serv_exp_sub' },


        // ==========================================
        // HOME (Existing Mappings Refined)
        // ==========================================
        { selector: '.ll-welcome__title', key: 'bienvenida_titulo' },
        { selector: '.ll-welcome__subtitle', key: 'bienvenida_subtitulo' },
        { selector: '.ll-welcome-card__title', match: 'CONDICIONES', key: 'card1_title' },
        { selector: '.ll-welcome-card__text', match: 'patrones', key: 'card1_text' },
        { selector: '.ll-welcome-card__title', match: 'GRANDIOSOS', key: 'card2_title' },
        { selector: '.ll-welcome-card__text', match: 'Vuele', key: 'card2_text' },
        { selector: '.ll-welcome-card__title', match: 'EXPERTOS', key: 'card3_title' },
        { selector: '.ll-welcome-card__text', match: 'reconocido', key: 'card3_text' },
        { selector: '.ll-destination__title', key: 'destino_titulo' },
        { selector: '.ll-destination__description', key: 'destino_desc' },
        { selector: '.ll-seasons__label', key: 'temporadas_label' },
        { selector: '.ll-seasons__title', match: 'CONOCE', key: 'temporadas_titulo' },
        { selector: '.ll-seasons__period-title', match: 'ALTA', key: 'temp_alta_label' },
        { selector: '.ll-seasons__period-range', match: 'Septiembre', key: 'temp_alta_val' },
        { selector: '.ll-seasons__period-title', match: 'BAJA', key: 'temp_baja_label' },
        { selector: '.ll-seasons__period-range', match: 'Abril', key: 'temp_baja_val' },
        { selector: '.ll-seasons__title--second', key: 'clima_titulo' },
        { selector: '.ll-tracks__label', key: 'tracks_label' },
        { selector: '.ll-tracks__title', key: 'tracks_titulo' },
        { selector: '.ll-tracks__description', key: 'tracks_desc' },
        { selector: '.ll-hero__pretitle', key: 'hero2_pre' },
        { selector: '.ll-hero__title', key: 'hero2_title' },
        { selector: '.ll-hero__description', key: 'hero2_desc' },
        { selector: '.ll-location__title', key: 'loc_titulo' },
        { selector: '.ll-location__text', match: 'Dirección', key: 'loc_addr' },
        { selector: '.ll-location__text', match: 'Teléfonos', key: 'loc_phone' },
        { selector: '.ll-experiences__label', key: 'exp_label' },
        { selector: '.ll-experiences__title', key: 'exp_title' },
        { selector: '.ll-experiences__description', key: 'exp_desc' },
        { selector: '.ll-experience-card__title', match: 'Hospedaje', key: 'card_hosp_title' },
        { selector: '.ll-experience-card__text', match: 'Descubre', key: 'card_hosp_text' },
        { selector: '.ll-experience-card__title', match: 'Restaurantes', key: 'card_rest_title' },
        { selector: '.ll-experience-card__text', match: 'Explora', key: 'card_rest_text' },
        { selector: '.ll-experience-card__title', match: 'Atractivos', key: 'card_atr_title' },
        { selector: '.ll-experience-card__text', match: 'Descubre', key: 'card_atr_text' },
        { selector: '.ll-experience-card__title', match: 'Actividades', key: 'card_act_title' },
        { selector: '.ll-experience-card__text', match: 'Vive', key: 'card_act_text' },
        { selector: '.ll-experiences__footer-text', key: 'footer_text' },
        { selector: '.ll-experiences__cta', match: 'Ir', key: 'footer_link' },
    ];

    // Language state
    const VALID_LANGS = ['es', 'en', 'pt'];
    let currentLang = localStorage.getItem('ll_lang') || 'es';
    if (!VALID_LANGS.includes(currentLang)) currentLang = 'es';

    // Binding logic (Run immediately)
    function bindElements() {
        mapping.forEach(m => {
            const elements = document.querySelectorAll(m.selector);
            elements.forEach(el => {
                if (el.dataset.llKey) return;
                if (m.match && !el.textContent.includes(m.match)) return;
                el.dataset.llKey = m.key;
            });
        });
    }
    bindElements();

    // UI Logic: Create a new button from scratch
    createNewLanguageButton();
    applyLanguage(currentLang);

    function createNewLanguageButton() {
        // 1. Find the old button to replace
        const oldBtn = document.querySelector('.ll-adventure__lang');
        if (!oldBtn) return;

        // 2. Dupe check
        if (document.getElementById('ll-new-lang-switcher')) return;

        // 3. Create Container (The Button Trigger)
        const container = document.createElement('div');
        container.id = 'll-new-lang-switcher';
        container.style.cssText = `
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            font-family: inherit;
            color: #fff;
            font-weight: 700;
            z-index: 9999;
            margin-left: 68px; 
            pointer-events: auto !important;
        `;

        // 4. Main Button Display
        const btnDisplay = document.createElement('div');
        btnDisplay.className = 'll-new-lang-display';
        // Applying original Square Design
        btnDisplay.style.cssText = `
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 16px; /* align-items center handles vertical centering with height */
            height: 48px;
            border-radius: 8px;
            border: 2px solid #ffffff;
            background: rgba(152, 172, 181, 0.4);
            backdrop-filter: blur(4px);
            transition: all 0.3s;
            box-sizing: border-box;
        `;

        btnDisplay.onmouseover = () => btnDisplay.style.backgroundColor = 'rgba(152, 172, 181, 0.6)';
        btnDisplay.onmouseout = () => btnDisplay.style.backgroundColor = 'rgba(152, 172, 181, 0.4)';

        const flagImg = document.createElement('img');
        flagImg.style.cssText = `width: 20px; height: 15px; object-fit: cover; border-radius: 2px; display: block; pointer-events: none;`;

        const labelSpan = document.createElement('span');
        labelSpan.style.cssText = `font-size: 16px; line-height: 1; text-transform: uppercase; font-weight: 700; pointer-events: none;`;

        const arrowSpan = document.createElement('span');
        arrowSpan.textContent = '▼';
        arrowSpan.style.cssText = `font-size: 10px; opacity: 0.8; margin-left: 2px; pointer-events: none;`;

        btnDisplay.appendChild(flagImg);
        btnDisplay.appendChild(labelSpan);
        btnDisplay.appendChild(arrowSpan);
        container.appendChild(btnDisplay);

        // 5. Dropdown (Portal to Body)
        const dropdown = document.createElement('div');
        dropdown.id = 'll-lang-dropdown-portal';
        dropdown.style.cssText = `
            position: absolute;
            top: 0;
            left: 0;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            display: none;
            flex-direction: column;
            min-width: 150px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05);
            padding: 5px 0;
            z-index: 9999999;
        `;

        const langs = [
            { code: 'es', label: 'Español', icon: 'espaniol.png' },
            { code: 'en', label: 'English', icon: 'english.png' },
            { code: 'pt', label: 'Português', icon: 'brazil.png' }
        ];

        langs.forEach(l => {
            const item = document.createElement('div');
            item.className = 'll-lang-item';
            item.style.cssText = `
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 10px 15px;
                cursor: pointer;
                color: #333;
                font-size: 14px;
                font-weight: 500;
                transition: background 0.2s;
            `;
            item.innerHTML = `
                <img src="${LL_Data.assetBase}${l.icon}" style="width: 20px; height: auto; pointer-events: none;">
                <span style="pointer-events: none;">${l.label}</span>
            `;

            item.onmouseover = () => item.style.backgroundColor = '#f0f2f5';
            item.onmouseout = () => item.style.backgroundColor = 'transparent';

            item.onclick = (e) => {
                e.preventDefault();
                e.stopPropagation();
                setLanguage(l.code);
                dropdown.style.display = 'none';
            };

            dropdown.appendChild(item);
        });

        document.body.appendChild(dropdown);

        // 6. Interaction Logic
        const toggleDropdown = (e) => {
            e.stopPropagation();
            e.preventDefault();

            const isOpen = dropdown.style.display === 'flex';

            if (isOpen) {
                dropdown.style.display = 'none';
            } else {
                const rect = container.getBoundingClientRect();
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

                dropdown.style.top = (rect.bottom + scrollTop + 8) + 'px';
                dropdown.style.left = (rect.right + scrollLeft - 150) + 'px';

                if (parseInt(dropdown.style.left) < 0) {
                    dropdown.style.left = (rect.left + scrollLeft) + 'px';
                }

                dropdown.style.display = 'flex';
            }
        };

        container.addEventListener('click', toggleDropdown);

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!container.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });

        window.addEventListener('scroll', () => { if (dropdown.style.display === 'flex') dropdown.style.display = 'none'; }, { passive: true });
        window.addEventListener('resize', () => { if (dropdown.style.display === 'flex') dropdown.style.display = 'none'; }, { passive: true });

        // 7. Inject (Replace)
        oldBtn.replaceWith(container);

        window.llLangUI = {
            flag: flagImg,
            label: labelSpan,
            container: container
        };
    }

    function setLanguage(lang) {
        if (!VALID_LANGS.includes(lang)) return;
        currentLang = lang;
        localStorage.setItem('ll_lang', lang);
        applyLanguage(lang);
    }

    /* Helper updates custom headlines */
    function updateQuienesHeadline(el, lang) {
        if (lang === 'es') el.innerHTML = 'CENTRO DE <span class="ll-quienes__headline--accent">VUELO</span>';
        else if (lang === 'en') el.innerHTML = 'FLIGHT <span class="ll-quienes__headline--accent">CENTER</span>';
        else if (lang === 'pt') el.innerHTML = 'CENTRO DE <span class="ll-quienes__headline--accent">VOO</span>';
    }

    function updateServicesHero(el, lang) {
        if (lang === 'es') el.innerHTML = 'VUELOS <span class="ll-adventure__headline--accent">BIPLAZA</span>: TU AVENTURA COMIENZA EN EL AIRE';
        else if (lang === 'en') el.innerHTML = 'TANDEM <span class="ll-adventure__headline--accent">FLIGHTS</span>: YOUR ADVENTURE STARTS IN THE AIR';
        else if (lang === 'pt') el.innerHTML = 'VOOS <span class="ll-adventure__headline--accent">DUPLOS</span>: SUA AVENTURA COMEÇA NO AR';
    }

    function applyLanguage(lang) {
        // Translation Logic
        document.querySelectorAll('[data-ll-key]').forEach(el => {
            const key = el.dataset.llKey;

            if (key === 'quienes_hero_1') { updateQuienesHeadline(el, lang); return; }
            if (key === 'serv_hero_1') { updateServicesHero(el, lang); return; }

            if (dictionary[lang] && dictionary[lang][key]) {
                replaceTextContentPreservingChildren(el, dictionary[lang][key]);
            }
        });

        // Update New UI
        if (window.llLangUI) {
            window.llLangUI.label.textContent = lang.toUpperCase();
            if (lang === 'es') window.llLangUI.flag.src = LL_Data.assetBase + 'espaniol.png';
            if (lang === 'en') window.llLangUI.flag.src = LL_Data.assetBase + 'english.png';
            if (lang === 'pt') window.llLangUI.flag.src = LL_Data.assetBase + 'brazil.png';
        }

        // Legacy Hero Update (Home)
        updateHeroHeadline(lang);
    }

    function replaceTextContentPreservingChildren(element, newText) {
        if (element.children.length === 0) {
            element.textContent = newText;
            return;
        }
        let targetNode = null;
        for (let node of element.childNodes) {
            if (node.nodeType === Node.TEXT_NODE && node.textContent.trim().length > 0) {
                targetNode = node;
                break;
            }
        }
        if (targetNode) targetNode.textContent = ' ' + newText + ' ';
    }

    function updateHeroHeadline(lang) {
        const headlines = document.querySelectorAll('.ll-adventure__headline');
        if (headlines.length >= 3) {
            // Safety check: Ensure we are on Home by checking content similarity to known strings
            const h1Text = headlines[0].textContent;
            if (h1Text.includes('TU') || h1Text.includes('YOUR') || h1Text.includes('SUA')) {
                if (lang === 'es') {
                    headlines[0].innerHTML = 'TU <span class="ll-adventure__headline--accent">AVENTURA</span>';
                    headlines[1].textContent = 'EMPIEZA EN LAS';
                    headlines[2].textContent = 'VIZCACHAS CHILE';
                } else if (lang === 'en') {
                    headlines[0].innerHTML = 'YOUR <span class="ll-adventure__headline--accent">ADVENTURE</span>';
                    headlines[1].textContent = 'STARTS AT';
                    headlines[2].textContent = 'VIZCACHAS CHILE';
                } else if (lang === 'pt') {
                    headlines[0].innerHTML = 'SUA <span class="ll-adventure__headline--accent">AVENTURA</span>';
                    headlines[1].textContent = 'COMEÇA NAS';
                    headlines[2].textContent = 'VIZCACHAS CHILE';
                }
            }
        }
    }
});
