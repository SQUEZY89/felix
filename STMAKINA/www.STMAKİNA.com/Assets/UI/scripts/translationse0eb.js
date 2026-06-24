// ============================================
// translations.js v4 (TR/EN + 250+ word dict + Turkish suffix stripping)
console.log('%c[STMAKİNA] translations.js v4 yuklendi', 'background:#0a0a0a;color:#F44611;padding:2px 8px;border-radius:3px;');
// ============================================

// STMAKİNA i18n - TR/EN Translations
(function () {
    'use strict';

    var translations = {
        tr: {
            // Navbar
            'menu.home': 'Ana Sayfa',
            'menu.products': 'Ürünlerimiz',
            'menu.about': 'Hakkımızda',
            'menu.contact': 'İletişim',
            'menu.quote': 'Teklif Al',

            // Hero
            'hero.tag': 'ST MAKİNA',
            'hero.title.part1': 'Üretim hattınızı',
            'hero.title.highlight': 'geleceğe',
            'hero.title.part2': 'taşıyın',
            'hero.subtitle': 'Robot kaynak hücreleri, hidrolik pres sistemleri ve özel makine imalatı ile anahtar teslim çözümler. KUKA entegrasyonu ve PLC programlama tek elden.',
            'hero.btn.products': 'Ürünleri İncele',
            'hero.btn.contact': 'Bize Ulaşın',

            // Stats
            'stats.years': 'Yıl Tecrübe',
            'stats.projects': 'Tamamlanan Proje',
            'stats.clients': 'Kurumsal Müşteri',
            'stats.engineers': 'Mühendis Kadrosu',

            // Sürecimiz
            'process.eyebrow': 'SÜRECİMİZ',
            'process.title': 'SÜRECİMİZ',
            'process.subtitle.part1': '4 Adımda',
            'process.subtitle.highlight': 'Anahtar Teslim',
            'process.subtitle.part2': 'Robotik Sistem Kurulumu',
            'process.step1.title': 'Keşif & Analiz',
            'process.step1.text': 'Üretim hattınızı yerinde inceler, ihtiyaçları belirler ve uygulanabilir sistem çözümünü oluştururuz.',
            'process.step2.title': 'Mühendislik & Tasarım',
            'process.step2.text': 'Robot yerleşimi, mekanik tasarım, PLC-HMI mimarisi ve güvenlik senaryolarını projelendiririz.',
            'process.step3.title': 'İmalat & Entegrasyon',
            'process.step3.text': 'Mekanik imalat, pano üretimi, robot programlama ve otomasyon entegrasyonunu kendi bünyemizde tamamlarız.',
            'process.step4.title': 'Devreye Alma & Destek',
            'process.step4.text': 'Saha kurulumu, testler, operatör eğitimi ve satış sonrası teknik destek süreçlerini eksiksiz yürütürüz.',

            // Hizmetler
            'services.eyebrow': 'NE YAPIYORUZ',
            'services.title.part1': 'Anahtar Teslim',
            'services.title.highlight': 'Otomasyon',
            'services.title.part2': 'Çözümlerimiz',
            'services.subtitle': 'Robotik, mekanik ve otomasyon çözümlerini tek noktadan sunuyoruz.',
            'services.s1.title': 'Özel Makine ve Hat Tasarımı',
            'services.s1.text': 'Müşteriye özel üretim hatları, robotik hücreler ve mekanik sistemler geliştiririz.',
            'services.s1.tag': 'MEKANİK TASARIM',
            'services.s2.title': 'Robotik Sistem Entegrasyonu',
            'services.s2.text': 'Farklı marka ve tipte robot sistemlerinin kurulum, programlama ve devreye alma süreçlerini yönetiriz.',
            'services.s2.tag': 'KUKA · FANUC · ABB',
            'services.s3.title': 'Bakım ve Teknik Servis',
            'services.s3.text': 'Periyodik bakım, arıza müdahale ve sistem iyileştirme hizmetleri sunarız.',
            'services.s3.tag': '7/24 DESTEK',
            'services.s4.title': 'Proje Yönetimi ve Devreye Alma',
            'services.s4.text': 'Konseptten devreye almaya kadar tüm süreci planlı ve kontrollü şekilde yönetiriz.',
            'services.s4.tag': 'FAT · SAT · EĞİTİM',
            'services.cta.title': 'Projenizi birlikte değerlendirelim',
            'services.cta.text': 'Mühendis ekibimiz ihtiyacınızı inceler, en uygun çözümü sunar.',
            'services.cta.btn': 'Teklif Al',

            // CTA Bandı
            'cta.title.part1': 'Üretiminizi',
            'cta.title.highlight': 'Otomasyonla',
            'cta.title.part2': 'Güçlendirelim',
            'cta.subtitle': 'Fizibiliteden devreye almaya kadar tüm süreci mühendislik disipliniyle yönetiyoruz.',
            'cta.btn': 'Teklif Al',

            // Footer
            'footer.about': 'ST MAKİNA Makina; robotik otomasyon ve özel makine çözümleriyle üretim süreçlerinizi verimli, güvenilir ve sürdürülebilir hale getirir. Anahtar teslim projelerle tüm süreci uçtan uca yönetir.',
            'footer.pages': 'Sayfalar',
            'footer.services': 'Hizmetler',
            'footer.contact': 'İletişim',
            'footer.link.home': 'Ana Sayfa',
            'footer.link.products': 'Ürünlerimiz',
            'footer.link.about': 'Hakkımızda',
            'footer.link.contact': 'İletişim',
            'footer.svc.machine': 'Özel Makine ve Hat Tasarımı',
            'footer.svc.robot': 'Robotik Sistem Entegrasyonu',
            'footer.svc.maint': 'Bakım ve Teknik Servis',
            'footer.svc.proj': 'Proje Yönetimi',
            'footer.copyright': '© 2026 ST MAKİNA hakları saklıdır.',
            'footer.tags': 'Endüstriyel Otomasyon · Robotik Sistemler · Özel Makine İmalatı',

            // İletişim Sayfası
            'contact.tag': 'İLETİŞİM',
            'contact.title.part1': 'Projenizi',
            'contact.title.highlight': 'Birlikte',
            'contact.title.part2': 'Planlayalım',
            'contact.subtitle': 'İhtiyacınızı analiz ediyor, en uygun çözümü sunuyor ve 24 saat içinde geri dönüş sağlamayı taahhüt ediyoruz.',
            'contact.trust1.label': 'Yıl Deneyim',
            'contact.trust2.label': 'Tamamlanan Proje',
            'contact.trust3.label': 'Kurumsal Müşteri',
            'contact.card.phone.label': 'Hemen Arayın',
            'contact.card.phone.cta': 'Konuşalım',
            'contact.card.wa.label': 'WhatsApp',
            'contact.card.wa.value': 'Hızlı Cevap',
            'contact.card.wa.cta': 'Mesaj Gönder',
            'contact.card.support.label': 'Teknik Destek',
            'contact.card.support.cta': 'Destek Alın',
            'contact.card.email.label': 'E-posta',
            'contact.card.email.cta': 'Mail Atın',
            'contact.card.address.label': 'Fabrika & Ofis',
            'contact.card.address.value': 'küçük sanayi sitesi 73009 cad. kaportacının solundaki ofis ',
            'contact.card.address.cta': 'Yol Tarifi Al',

            // Hakkımızda
            'about.tag': 'Hakkımızda',
            'about.title.part1': 'ST',
            'about.title.highlight': 'MAKİNA',
            'about.title.part2': 'KAHRAMANMARAŞ',
            'about.intro':'2016 Yılında kurulan şirketimiz; CNC Makina satışı ve servisi ile talaşlı imalat olarak müşterilerine hizmet vermektedir. Kuruluşundan itibaren müşteri memnuniyetini ön planda tutarak, kaliteli ürün, doğru termin ve uygun fiyat politikasıyla sektöründe güvenilir bir firma olmak için çalışmalarını sürdürmektedir. Teknolojiyi yakından takip eden ST makina; Cnc dik işleme, cnc yatay işleme, cnc torna, cncborwek, cnc doublecolon, cnc otomat, universal torna tezgahı, freze tezgahı, matkap makinesi, radyal matkap makinesi, taşlama tezgahı,kaynak makinesi, vb. ürün çeşitleri ile müşterilerine en iyi hizmeti vermektedir. ST makinanın dünden bugüne sanayi sektöründe hem satış hem de satış sonrası hizmetleri ile sektörün öncüsü,fark edilir bir kalite politikası izleyerek yoluna devam ediyor… ST Makina TORNOS firmasının Türkiye yetkili servisini alarak; makina satış ve servis hizmetlerine başlamıştır. ST Makina BORSAN CNC firmasının Bursa bayiliğini yapmaktadır. Bursa bölgesinde, CNC Freze tezgahları, CNC Torna tezgahları, CNC Borvek tezgahları, Taşlama tezgahları, Testere tezgahları satmakta ve bunların servisini vermektedir. ST Makina kendi bünyesinde talaşlı imalat yaparak, müşterilerine bu konuda da hizmet vermektedir.', 'about.mission.eyebrow': 'MİSYONUMUZ',
            'about.mission.eyebrow': 'MİSYONUMUZ',
            'about.mission.title.part1': 'Mühendislik',
            'about.mission.title.highlight': 'tutkusu',
            'about.mission.title.part2': 'ile',
            'about.values.eyebrow': 'DEĞERLERİMİZ',
            'about.values.title.part1': 'Neyi',
            'about.values.title.highlight': 'önemsiyoruz',
            'about.values.title.part2': '?',
            'about.value1.title': 'Mühendislik Disiplini',
            'about.value1.text': 'Her projede analiz, hesap, simülasyon ve test adımlarını eksiksiz uygularız.',
            'about.value2.title': 'Şeffaf İletişim',
            'about.value2.text': 'Söz verdiğimiz bütçe ve teslim tarihinin arkasında dururuz; her adımı raporlarız.',
            'about.value3.title': 'Garanti & Destek',
            'about.value3.text': 'Devreye almanın bitişi, ilişkimizin başıdır. Yedek parça ve teknik destek 7/24.',

            // Urunler Sayfasi (CategoryDetail)
            'urun.tag': 'ÜRÜNLERİMİZ',
            'urun.title.part1': 'Endüstriyel',
            'urun.title.highlight': 'Robotik & Otomasyon',
            'urun.title.part2': 'Çözümlerimiz',
            'urun.subtitle': 'Robot kaynak hücreleri, hidrolik presler, özel makine tasarımı ve PLC tabanlı otomasyon hatları.',
            'urun.loadmore': 'Daha Fazla Yükle',
            'urun.bottomcta.title': 'Aradığınız ürünü bulamadınız mı?',
            'urun.bottomcta.text': 'Size özel çözümler tasarlıyoruz. Mühendis ekibimizle ihtiyacınızı konuşalım.',
            'urun.bottomcta.btn': 'Proje Danışmanlığı Al',

            // Kategori etiketleri (kart üzerindeki kısa rozet)
            'urun.cat.robot': 'ROBOT PROJESİ',
            'urun.cat.machine': 'MAKİNA PROJESİ',
            'urun.cat.automation': 'OTOMASYON PROJESİ',
            'urun.cat.default': 'PROJE',

            // Kategori adı (hero başlığındaki büyük başlık)
            'urun.catname.robot': 'Robot Projeleri',
            'urun.catname.machine': 'Makina Projeleri',
            'urun.catname.automation': 'Otomasyon Projeleri',
            // Boş EngName fallback için kullanılacak (sözlük en garantili)

            // Kart içeriği
            'urun.card.detail': 'Projeyi İncele',
            'urun.media.empty': 'Görsel yakında eklenecek',
            'urun.media.error': 'Video yüklenemedi',
            'urun.empty.title': 'Henüz proje bulunmamaktadır.',
            'urun.empty.text': 'Yakında yeni projeler eklenecek.',

            // Kategori liste sayfası
            'category.tag': 'KATEGORİLER',
            'category.title.part1': 'Endüstriyel',
            'category.title.highlight': 'Çözüm',
            'category.title.part2': 'Kategorilerimiz',
            'category.subtitle': 'İhtiyacınıza uygun kategoriyi seçin, projelerimizi keşfedin.',

            // Kategori kart metinleri
            'urun.kart.text': 'Detaylar ve projeler için tıklayın.',
            'urun.kart.btn': 'Projeleri Gör',
            'urun.error.load': 'Yükleme hatası.',

            // Ürün detay sayfası
            'pd.technical': 'Teknik Resimler',
            'pd.close': 'Kapat',
            'pd.features': 'Özellikler',
            'pd.attachments': 'Ekler',
            'pd.cta.quote': 'Teklif Al',
            'pd.cta.wa': 'WhatsApp ile Bilgi Al',
            'pd.trust.engineering': 'Mühendislik desteği',
            'pd.trust.turnkey': 'Anahtar teslim kurulum',
            'pd.trust.ce': 'CE standartlarında',
            'pd.section.details': 'Proje Detayları',
            'pd.section.features': 'Sistem Özellikleri',
            'pd.section.gallery': 'Proje Galerisi',
            'pd.section.attachments': 'Ek Modüller & Videolar',
            'pd.section.docs': 'Proje Dokümanları',
            'pd.doc.download': 'İndir',
            'pd.doc.untitled': 'İsimsiz Doküman',
            'pd.notitle': 'Proje',
            'pd.nodesc': 'Mühendislik ekibimizle özel olarak tasarlanmış proje.',

            // Alert mesajları
            'alert.oops': 'Hata...',
            'alert.notfound': 'Ürün bulunamadı!',
            'alert.error': 'Bir şeyler ters gitti!',

            // WhatsApp Widget
            'wa.title': 'ST MAKİNA',
            'wa.status': 'Aktif · genelde 5 dk içinde yanıt',
            'wa.greeting': 'Merhaba 👋',
            'wa.help': 'Hangi konuda destek olabilirim? Aşağıdan seçim yapın, WhatsApp\'ta hemen sohbete başlayalım.',
            'wa.opt1.t': 'Robot Kaynak Teklifi',
            'wa.opt1.s': 'Kaynak hücresi, robot entegrasyon',
            'wa.opt2.t': 'Özel Makine Danışmanlık',
            'wa.opt2.s': 'Makine tasarımı, fizibilite',
            'wa.opt3.t': 'PLC & Otomasyon',
            'wa.opt3.s': 'PLC programlama, hat entegrasyonu',
            'wa.opt4.t': 'Yedek Parça & Servis',
            'wa.opt4.s': 'Bakım, arıza, teknik destek',
            'wa.opt5.t': 'Genel Bilgi',
            'wa.opt5.s': 'Hizmet kapsamı, kurumsal bilgi',
            'wa.footer': 'Güvenli iletişim · KVKK uyumlu',

            // Konum widget'i (WhatsApp butonunun üstündeki)
            'map.tooltip': 'Konumumuz',

            // Hero güven satırı + WhatsApp CTA
            'hero.trust.1': '20+ Yıl Tecrübe',
            'hero.trust.2': '150+ Tamamlanan Proje',
            'hero.trust.3': 'CE Sertifikalı',
            'hero.trust.4': 'KUKA / FANUC / ABB Yetkin',
            'hero.btn.whatsapp': 'WhatsApp ile Hızlı Teklif',

            // Solutions / Çözüm Kartları (anasayfa)
            'solutions.eyebrow': 'UZMANLIK ALANLARIMIZ',

            // Sektör barı
            'sector.eyebrow': 'HİZMET VERDİĞİMİZ SEKTÖRLER',
            'sector.title': 'Türkiye\'nin önde gelen sanayi kuruluşları ile çalışıyoruz',
            'sector.automotive': 'Otomotiv Yan Sanayi',
            'sector.appliance': 'Beyaz Eşya',
            'sector.defense': 'Savunma Sanayi',
            'sector.metal': 'Metal İşleme',
            'sector.furniture': 'Mobilya',
            'sector.food': 'Gıda & Kimya',

            // Neden ST MAKİNA
            'why.eyebrow': 'NEDEN ST MAKİNA',
            'why.title.part1': 'Mühendislik Disiplini ile',
            'why.title.highlight': 'Anahtar Teslim',
            'why.title.part2': 'Çözümler',
            'why.subtitle': 'Endüstriyel otomasyon ihtiyacınız için mekanik, robotik ve PLC tarafını tek noktadan yöneten mühendislik ekibi.',
            'why.c1.title': 'Mühendislik Disiplini',
            'why.c1.text': 'Her projede analiz, hesap, simülasyon ve test adımları eksiksiz uygulanır. 35 mühendisten oluşan ekibimiz hesaplı çözüm üretir.',
            'why.c1.metric': 'Mühendis Kadrosu',
            'why.c2.title': 'Çoklu Robot Yetkinliği',
            'why.c2.text': 'KUKA, FANUC, ABB ve Yaskawa entegrasyonunda yetkin mühendis ekibi. Tek tedarikçiye bağlı kalmadan en uygun çözüm önerilir.',
            'why.c2.metric': 'Robot Markası',
            'why.c3.title': 'Anahtar Teslim Süreç',
            'why.c3.text': 'Konseptten devreye almaya kadar tüm aşamalar tek noktadan yönetilir. Mekanik, elektrik, yazılım, FAT/SAT, eğitim — hepsi içeride.',
            'why.c3.metric': 'Ortalama Teslim',
            'why.c4.title': 'CE Sertifikalı Güvenlik',
            'why.c4.text': 'Pilz güvenlik PLC, ışık perdeleri, ISO 13849-1 PL-d/PL-e seviyesi. Her sistem CE direktiflerine uygun dokümante edilir.',
            'why.c4.metric': 'Tüm Sistemler',
            'why.c5.title': '7/24 Teknik Destek',
            'why.c5.text': 'Devreye almadan sonra 24 ay garanti, ardından bakım sözleşmesi. Telefon, uzaktan bağlantı ve saha desteği aktif.',
            'why.c5.metric': 'Garanti Süresi',
            'why.c6.title': 'Yerli İmalat, Global Standart',
            'why.c6.text': 'Esenyurt İstanbul tesisimizde imalat, ISO 9001:2015 kalite yönetimi. Yerli üretici hızı, uluslararası standart kalitesi.',
            'why.c6.metric': 'Kalite Standardı',

            // Sertifikalar
            'certs.eyebrow': 'STANDARTLAR & BELGELER',
            'certs.title': 'Uluslararası standartlarda üretim, denetlenmiş kalite',
            'certs.subtitle': 'Tüm sistemlerimiz CE direktiflerine uygun şekilde tasarlanır ve dokümante edilir. Üretim süreçlerimiz ISO 9001 kalite yönetimi standardında yürütülür.',
            'certs.ce.title': 'CE Sertifikası',
            'certs.ce.text': 'Makine 2006/42/EC, LVD ve EMC direktifleri',
            'certs.iso9001.title': 'ISO 9001:2015',
            'certs.iso9001.text': 'Kalite Yönetim Sistemi',
            'certs.iso13849.title': 'ISO 13849-1',
            'certs.iso13849.text': 'Makine güvenlik (PL-d / PL-e)',
            'certs.en60204.title': 'EN 60204-1',
            'certs.en60204.text': 'Elektrik donanım güvenlik standardı',
            'certs.tse.title': 'TSE Belgeli',
            'certs.tse.text': 'Yerli üretim onay belgesi',
            'certs.iso14001.title': 'ISO 14001',
            'certs.iso14001.text': 'Çevre Yönetim Sistemi',

            // SSS (FAQ)
            'faq.eyebrow': 'SIK SORULAN SORULAR',
            'faq.title.part1': 'Robotik Otomasyon ve',
            'faq.title.highlight': 'Özel Makine',
            'faq.title.part2': 'Hakkında',
            'faq.subtitle': 'Müşterilerimizden en sık aldığımız soruları ve mühendis ekibimizin profesyonel yanıtlarını derledik.',
            'faq.bottomcta.title': 'Sorunuzun cevabı yok mu?',
            'faq.bottomcta.text': 'Mühendis ekibimizle 15 dakikalık ücretsiz online görüşme alın. Projenizi birlikte değerlendirelim.',
            'faq.bottomcta.btn': 'Mühendisle Görüşme Talep Et',

            // FAQ — Sorular ve Cevaplar
            'faq.q1.q': 'Robot kaynak hücresi nedir ve hangi avantajları sağlar?',
            'faq.q1.a': '<p>Robot kaynak hücresi, endüstriyel bir robotun güvenlik kabini içinde fikstür ve kaynak ekipmanlarıyla çalıştığı kapalı üretim ünitesidir. <strong>MIG/MAG, TIG, punto ve lazer kaynak</strong> uygulamalarında kullanılır.</p><ul><li>Tekrarlanabilir, sabit kaliteli kaynak</li><li>İnsan hatasının elenmesi, ıskarta oranı düşüşü</li><li>3 vardiya kesintisiz üretim</li><li>Operatör güvenliği ve ergonomi</li></ul>',
            'faq.q2.q': 'Hangi robot markalarıyla entegrasyon yapıyorsunuz?',
            'faq.q2.a': '<p>Mühendis ekibimiz <strong>KUKA, FANUC, ABB ve Yaskawa</strong> markalarında programlama yetkinliğine sahiptir. PLC tarafında <strong>Siemens S7-1500, Allen-Bradley CompactLogix, Beckhoff TwinCAT</strong> sistemleri kullanılır. Projenin gereksinimlerine en uygun donanımı öneriyoruz.</p>',
            'faq.q3.q': 'Bir projenin devreye alma süreci ne kadar sürer?',
            'faq.q3.a': '<p>Robot kaynak hücresi <strong>8-12 hafta</strong>, özel makine projeleri <strong>10-16 hafta</strong> içinde devreye alınır.</p><ul><li>Keşif &amp; analiz: 1 hafta</li><li>Mühendislik &amp; tasarım: 2-3 hafta</li><li>İmalat &amp; entegrasyon: 4-6 hafta</li><li>FAT/SAT testleri + saha kurulumu: 2-3 hafta</li></ul>',
            'faq.q4.q': 'Sistemleriniz CE sertifikalı mı, hangi standartlara uygun?',
            'faq.q4.a': '<p>Tüm sistemlerimiz <strong>CE direktiflerine</strong> (Makine 2006/42/EC, LVD, EMC) uygundur. <strong>ISO 9001:2015</strong> kalite yönetimi standardında üretiriz. Güvenlik tarafında <strong>ISO 13849-1 PL-d/PL-e</strong> ve <strong>Pilz</strong> sistemleri kullanılır. Her teslimatla risk değerlendirmesi, kullanım kılavuzu ve devre şemaları paylaşılır.</p>',
            'faq.q5.q': 'Mevcut üretim hattıma robot entegre edilebilir mi?',
            'faq.q5.a': '<p>Evet — bizim en sık çalıştığımız proje türlerinden biridir. Tesisinizde keşif ziyareti yapılır, üretim akışı incelenir, <strong>3D simülasyon</strong> ile yerleşim doğrulanır, mevcut PLC altyapınıza entegrasyon planlanır. Üretim kesintisi minimumda tutulur.</p>',
            'faq.q6.q': 'Devreye almadan sonra teknik destek veriliyor mu?',
            'faq.q6.a': '<p>Tüm projelerde <strong>24 ay garanti</strong> + 7/24 telefon ve uzaktan bağlantı desteği. Periyodik bakım ziyaretleri, yedek parça tedariki, yazılım güncelleme ve operatör tazeleme eğitimleri kapsamdadır. Yıllık bakım sözleşmesi opsiyoneldir.</p>',
            'faq.q7.q': 'Hangi sektörlere hizmet veriyorsunuz?',
            'faq.q7.a': '<p>Otomotiv yan sanayi, beyaz eşya, savunma sanayi, metal işleme, mobilya endüstrisi, gıda ve kimya sektörlerine hizmet veriyoruz. <strong>150+ tamamlanmış proje, 80+ kurumsal müşteri</strong>.</p>',
            'faq.q8.q': 'Teklif almak için hangi bilgileri hazırlamalıyım?',
            'faq.q8.a': '<p>İlk görüşmede temel bilgi yeterli. Detaylı teklif için: parçanın <strong>3D modeli/teknik resmi</strong>, hedef <strong>üretim kapasitesi</strong>, mevcut <strong>hat yerleşim planı</strong>, vardiya tercihi. Bu bilgiler olmasa da çekinmeden iletişime geçin.</p>',

            // Sertifikalar Bölümü
            'certs.eyebrow': 'STANDARTLAR &amp; BELGELER',
            'certs.title': 'Uluslararası standartlarda üretim, denetlenmiş kalite',
            'certs.subtitle': 'Tüm sistemlerimiz CE direktiflerine uygun şekilde tasarlanır ve dokümante edilir. Üretim süreçlerimiz ISO 9001 kalite yönetimi standardında yürütülür.',
            'certs.ce.title': 'CE Sertifikası',
            'certs.ce.text': 'Makine 2006/42/EC, LVD ve EMC direktifleri',
            'certs.iso9001.title': 'ISO 9001:2015',
            'certs.iso9001.text': 'Kalite Yönetim Sistemi',
            'certs.iso13849.title': 'ISO 13849-1',
            'certs.iso13849.text': 'Makine güvenlik (PL-d / PL-e)',
            'certs.en60204.title': 'EN 60204-1',
            'certs.en60204.text': 'Elektrik donanım güvenlik standardı',
            'certs.tse.title': 'TSE Belgeli',
            'certs.tse.text': 'Yerli üretim onay belgesi',
            'certs.iso14001.title': 'ISO 14001',
            'certs.iso14001.text': 'Çevre Yönetim Sistemi'
        },
        en: {
            // Navbar
            'menu.home': 'Home',
            'menu.products': 'Products',
            'menu.about': 'About Us',
            'menu.contact': 'Contact',
            'menu.quote': 'Get Quote',

            // Hero
            'hero.tag': 'Industrial Automation',
            'hero.title.part1': 'Take your production line',
            'hero.title.highlight': 'to the future',
            'hero.title.part2': '',
            'hero.subtitle': 'Turnkey solutions with robot welding cells, hydraulic press systems and custom machine manufacturing. KUKA integration and PLC programming from a single source.',
            'hero.btn.products': 'View Products',
            'hero.btn.contact': 'Contact Us',

            // Stats
            'stats.years': 'Years Experience',
            'stats.projects': 'Completed Projects',
            'stats.clients': 'Corporate Clients',
            'stats.engineers': 'Engineering Team',

            // Process
            'process.eyebrow': 'OUR PROCESS',
            'process.title': 'OUR PROCESS',
            'process.subtitle.part1': '4 Steps to',
            'process.subtitle.highlight': 'Turnkey',
            'process.subtitle.part2': 'Robotic System Installation',
            'process.step1.title': 'Discovery & Analysis',
            'process.step1.text': 'We inspect your production line on-site, identify needs and create an applicable system solution.',
            'process.step2.title': 'Engineering & Design',
            'process.step2.text': 'We design robot layout, mechanical design, PLC-HMI architecture and safety scenarios.',
            'process.step3.title': 'Manufacturing & Integration',
            'process.step3.text': 'We complete mechanical manufacturing, panel production, robot programming and automation integration in-house.',
            'process.step4.title': 'Commissioning & Support',
            'process.step4.text': 'We carry out site installation, testing, operator training and after-sales technical support seamlessly.',

            // Services
            'services.eyebrow': 'WHAT WE DO',
            'services.title.part1': 'Turnkey',
            'services.title.highlight': 'Automation',
            'services.title.part2': 'Solutions',
            'services.subtitle': 'We deliver robotic, mechanical and automation solutions from a single source.',
            'services.s1.title': 'Custom Machine & Line Design',
            'services.s1.text': 'We develop customer-specific production lines, robotic cells and mechanical systems.',
            'services.s1.tag': 'MECHANICAL DESIGN',
            'services.s2.title': 'Robotic System Integration',
            'services.s2.text': 'We manage installation, programming and commissioning of various brands and types of robot systems.',
            'services.s2.tag': 'KUKA · FANUC · ABB',
            'services.s3.title': 'Maintenance & Technical Service',
            'services.s3.text': 'We provide periodic maintenance, fault response and system improvement services.',
            'services.s3.tag': '24/7 SUPPORT',
            'services.s4.title': 'Project Management & Commissioning',
            'services.s4.text': 'We manage the entire process from concept to commissioning in a planned and controlled manner.',
            'services.s4.tag': 'FAT · SAT · TRAINING',
            'services.cta.title': 'Let\'s evaluate your project together',
            'services.cta.text': 'Our engineering team analyzes your needs and offers the best solution.',
            'services.cta.btn': 'Get Quote',

            // CTA Band
            'cta.title.part1': 'Empower Your Production',
            'cta.title.highlight': 'with Automation',
            'cta.title.part2': '',
            'cta.subtitle': 'We manage the entire process from feasibility to commissioning with engineering discipline.',
            'cta.btn': 'Get Quote',

            // Footer
            'footer.about': 'STMAKİNA Otomasyon Makina makes your production processes efficient, reliable and sustainable with robotic automation and custom machine solutions. We manage the entire process end-to-end with turnkey projects.',
            'footer.pages': 'Pages',
            'footer.services': 'Services',
            'footer.contact': 'Contact',
            'footer.link.home': 'Home',
            'footer.link.products': 'Products',
            'footer.link.about': 'About Us',
            'footer.link.contact': 'Contact',
            'footer.svc.machine': 'Custom Machine & Line Design',
            'footer.svc.robot': 'Robotic System Integration',
            'footer.svc.maint': 'Maintenance & Technical Service',
            'footer.svc.proj': 'Project Management',
            'footer.copyright': '© 2026 STMAKİNA Otomasyon Makina. All rights reserved.',
            'footer.tags': 'Industrial Automation · Robotic Systems · Custom Machine Manufacturing',

            // Contact
            'contact.tag': 'CONTACT',
            'contact.title.part1': 'Let\'s Plan Your',
            'contact.title.highlight': 'Project',
            'contact.title.part2': 'Together',
            'contact.subtitle': 'We analyze your needs, offer the most suitable solution and commit to responding within 24 hours.',
            'contact.trust1.label': 'Years Experience',
            'contact.trust2.label': 'Completed Projects',
            'contact.trust3.label': 'Corporate Clients',
            'contact.card.phone.label': 'Call Now',
            'contact.card.phone.cta': 'Let\'s Talk',
            'contact.card.wa.label': 'WhatsApp',
            'contact.card.wa.value': 'Quick Reply',
            'contact.card.wa.cta': 'Send Message',
            'contact.card.support.label': 'Technical Support',
            'contact.card.support.cta': 'Get Support',
            'contact.card.email.label': 'Email',
            'contact.card.email.cta': 'Send Mail',
            'contact.card.address.label': 'Factory & Office',
            'contact.card.address.value': 'Orhangazi Mah. Isiso Sanayi Sitesi T Blok No:5, 34519 Esenyurt/Istanbul',
            'contact.card.address.cta': 'Get Directions',

            // About
            'about.tag': 'About Us',
            'about.title.part1': 'The team',
            'about.title.highlight': 'driving',
            'about.title.part2': 'production toward automation',
            'about.intro': 'STMAKİNA is your solution partner in industrial automation and custom machine manufacturing. With over 20 years of experience, we manage robot welding cells, hydraulic press systems and PLC-based control solutions end-to-end from feasibility to commissioning.',
            'about.mission.eyebrow': 'OUR MISSION',
            'about.mission.title.part1': 'With',
            'about.mission.title.highlight': 'engineering',
            'about.mission.title.part2': 'passion',
            'about.values.eyebrow': 'OUR VALUES',
            'about.values.title.part1': 'What we',
            'about.values.title.highlight': 'value',
            'about.values.title.part2': '?',
            'about.value1.title': 'Engineering Discipline',
            'about.value1.text': 'In every project, we apply the steps of analysis, calculation, simulation and testing thoroughly.',
            'about.value2.title': 'Transparent Communication',
            'about.value2.text': 'We stand behind the budget and delivery date we promise; we report every step.',
            'about.value3.title': 'Warranty & Support',
            'about.value3.text': 'The end of commissioning is the beginning of our relationship. Spare parts and technical support 24/7.',

            // Products page (CategoryDetail)
            'urun.tag': 'OUR PRODUCTS',
            'urun.title.part1': 'Industrial',
            'urun.title.highlight': 'Robotics & Automation',
            'urun.title.part2': 'Solutions',
            'urun.subtitle': 'Robot welding cells, hydraulic presses, custom machine design and PLC-based automation lines.',
            'urun.loadmore': 'Load More',
            'urun.bottomcta.title': 'Couldn\'t find what you need?',
            'urun.bottomcta.text': 'We design custom solutions. Let\'s discuss your needs with our engineering team.',
            'urun.bottomcta.btn': 'Get Project Consulting',

            // Card category badge (short label)
            'urun.cat.robot': 'ROBOT PROJECT',
            'urun.cat.machine': 'MACHINE PROJECT',
            'urun.cat.automation': 'AUTOMATION PROJECT',
            'urun.cat.default': 'PROJECT',

            // Hero title category name
            'urun.catname.robot': 'Robotic Solutions',
            'urun.catname.machine': 'Custom Machinery',
            'urun.catname.automation': 'Industrial Automation',

            // Card content
            'urun.card.detail': 'View Project',
            'urun.media.empty': 'Visual coming soon',
            'urun.media.error': 'Video could not load',
            'urun.empty.title': 'No projects yet.',
            'urun.empty.text': 'New projects will be added soon.',

            // Category list page
            'category.tag': 'CATEGORIES',
            'category.title.part1': 'Our Industrial',
            'category.title.highlight': 'Solution',
            'category.title.part2': 'Categories',
            'category.subtitle': 'Pick the category that matches your need and explore our projects.',

            // Category card texts
            'urun.kart.text': 'Click for details and projects.',
            'urun.kart.btn': 'View Projects',
            'urun.error.load': 'Loading error.',

            // Product detail page
            'pd.technical': 'Technical Drawings',
            'pd.close': 'Close',
            'pd.features': 'Features',
            'pd.attachments': 'Attachments',
            'pd.cta.quote': 'Get a Quote',
            'pd.cta.wa': 'Ask on WhatsApp',
            'pd.trust.engineering': 'Engineering support',
            'pd.trust.turnkey': 'Turnkey installation',
            'pd.trust.ce': 'CE certified',
            'pd.section.details': 'Project Details',
            'pd.section.features': 'System Features',
            'pd.section.gallery': 'Project Gallery',
            'pd.section.attachments': 'Add-on Modules & Videos',
            'pd.section.docs': 'Project Documents',
            'pd.doc.download': 'Download',
            'pd.doc.untitled': 'Untitled Document',
            'pd.notitle': 'Project',
            'pd.nodesc': 'Custom-engineered project designed by our engineering team.',

            // Alerts
            'alert.oops': 'Oops...',
            'alert.notfound': 'Product not found!',
            'alert.error': 'Something went wrong!',

            // WhatsApp Widget
            'wa.title': 'ST MAKİNA Engineering',
            'wa.status': 'Online · usually replies in 5 min',
            'wa.greeting': 'Hello 👋',
            'wa.help': 'How can we help? Pick an option below and let\'s chat on WhatsApp.',
            'wa.opt1.t': 'Robot Welding Quote',
            'wa.opt1.s': 'Welding cell, robot integration',
            'wa.opt2.t': 'Custom Machine Consulting',
            'wa.opt2.s': 'Machine design, feasibility',
            'wa.opt3.t': 'PLC & Automation',
            'wa.opt3.s': 'PLC programming, line integration',
            'wa.opt4.t': 'Spare Parts & Service',
            'wa.opt4.s': 'Maintenance, fault, technical support',
            'wa.opt5.t': 'General Information',
            'wa.opt5.s': 'Service scope, corporate info',
            'wa.footer': 'Secure communication · GDPR friendly',

            // Location widget (above the WhatsApp button)
            'map.tooltip': 'Our Location',

            // Hero trust + WhatsApp
            'hero.trust.1': '20+ Years Experience',
            'hero.trust.2': '150+ Completed Projects',
            'hero.trust.3': 'CE Certified',
            'hero.trust.4': 'KUKA / FANUC / ABB Expert',
            'hero.btn.whatsapp': 'Quick Quote on WhatsApp',

            // Solutions cards (homepage)
            'solutions.eyebrow': 'OUR EXPERTISE',

            // Sectors
            'sector.eyebrow': 'INDUSTRIES WE SERVE',
            'sector.title': 'Trusted by leading industrial companies in Türkiye',
            'sector.automotive': 'Automotive Tier-1',
            'sector.appliance': 'Home Appliances',
            'sector.defense': 'Defense Industry',
            'sector.metal': 'Metal Processing',
            'sector.furniture': 'Furniture',
            'sector.food': 'Food & Chemistry',

            // Why ST MAKİNA
            'why.eyebrow': 'WHY ST MAKİNA',
            'why.title.part1': 'Engineering Discipline,',
            'why.title.highlight': 'Turnkey',
            'why.title.part2': 'Solutions',
            'why.subtitle': 'Engineering team managing mechanical, robotic and PLC sides from a single source for your industrial automation needs.',
            'why.c1.title': 'Engineering Discipline',
            'why.c1.text': 'Every project includes thorough analysis, calculation, simulation and testing. Our 35-engineer team delivers calculated solutions.',
            'why.c1.metric': 'Engineers',
            'why.c2.title': 'Multi-Robot Expertise',
            'why.c2.text': 'Engineering team certified in KUKA, FANUC, ABB and Yaskawa integration. Vendor-neutral recommendations.',
            'why.c2.metric': 'Robot Brands',
            'why.c3.title': 'Turnkey Process',
            'why.c3.text': 'From concept to commissioning, all stages managed in-house: mechanical, electrical, software, FAT/SAT, training.',
            'why.c3.metric': 'Avg. Delivery',
            'why.c4.title': 'CE Certified Safety',
            'why.c4.text': 'Pilz safety PLC, light curtains, ISO 13849-1 PL-d/PL-e level. Every system documented per CE directives.',
            'why.c4.metric': 'All Systems',
            'why.c5.title': '24/7 Technical Support',
            'why.c5.text': '24-month warranty after commissioning, then maintenance contract. Phone, remote and on-site support active.',
            'why.c5.metric': 'Warranty',
            'why.c6.title': 'Local Manufacturing, Global Standards',
            'why.c6.text': 'In-house production at our Esenyurt İstanbul facility, ISO 9001:2015 quality management. Local speed, international quality.',
            'why.c6.metric': 'Quality Standard',

            // Certifications
            'certs.eyebrow': 'STANDARDS & CERTIFICATIONS',
            'certs.title': 'International standards, audited quality',
            'certs.subtitle': 'All our systems are designed and documented in accordance with CE directives. Our production processes are conducted under ISO 9001 quality management.',
            'certs.ce.title': 'CE Certificate',
            'certs.ce.text': 'Machinery 2006/42/EC, LVD, EMC directives',
            'certs.iso9001.title': 'ISO 9001:2015',
            'certs.iso9001.text': 'Quality Management System',
            'certs.iso13849.title': 'ISO 13849-1',
            'certs.iso13849.text': 'Machine safety (PL-d / PL-e)',
            'certs.en60204.title': 'EN 60204-1',
            'certs.en60204.text': 'Electrical equipment safety standard',
            'certs.tse.title': 'TSE Certified',
            'certs.tse.text': 'Local manufacturing approval',
            'certs.iso14001.title': 'ISO 14001',
            'certs.iso14001.text': 'Environmental Management System',

            // FAQ
            'faq.eyebrow': 'FREQUENTLY ASKED QUESTIONS',
            'faq.title.part1': 'About Robotic Automation',
            'faq.title.highlight': '& Custom Machinery',
            'faq.title.part2': '',
            'faq.subtitle': 'We have compiled the most common questions from our customers and the professional answers of our engineering team.',
            'faq.bottomcta.title': 'Can\'t find your answer?',
            'faq.bottomcta.text': 'Schedule a 15-minute free online consultation with our engineering team. Let\'s evaluate your project together.',
            'faq.bottomcta.btn': 'Talk to an Engineer',

            // FAQ — Questions and Answers
            'faq.q1.q': 'What is a robotic welding cell and what advantages does it provide?',
            'faq.q1.a': '<p>A robotic welding cell is an enclosed production unit where an industrial robot operates with fixtures and welding equipment inside a safety enclosure. It is used for <strong>MIG/MAG, TIG, spot, and laser welding</strong> applications.</p><ul><li>Repeatable, consistent quality welds</li><li>Elimination of human error, reduced scrap rate</li><li>Continuous 3-shift production</li><li>Operator safety and ergonomics</li></ul>',
            'faq.q2.q': 'Which robot brands do you integrate?',
            'faq.q2.a': '<p>Our engineering team is qualified to program <strong>KUKA, FANUC, ABB, and Yaskawa</strong> robots. On the PLC side, we work with <strong>Siemens S7-1500, Allen-Bradley CompactLogix, and Beckhoff TwinCAT</strong> systems. We recommend the most suitable hardware based on project requirements.</p>',
            'faq.q3.q': 'How long does it take to commission a project?',
            'faq.q3.a': '<p>Robotic welding cells are commissioned within <strong>8-12 weeks</strong>, custom machinery projects within <strong>10-16 weeks</strong>.</p><ul><li>Discovery &amp; analysis: 1 week</li><li>Engineering &amp; design: 2-3 weeks</li><li>Manufacturing &amp; integration: 4-6 weeks</li><li>FAT/SAT testing + on-site setup: 2-3 weeks</li></ul>',
            'faq.q4.q': 'Are your systems CE certified, and which standards do they comply with?',
            'faq.q4.a': '<p>All our systems comply with <strong>CE directives</strong> (Machinery 2006/42/EC, LVD, EMC). We manufacture under the <strong>ISO 9001:2015</strong> quality management standard. For safety, we use <strong>ISO 13849-1 PL-d/PL-e</strong> and <strong>Pilz</strong> systems. Each delivery includes a risk assessment, user manual, and circuit diagrams.</p>',
            'faq.q5.q': 'Can a robot be integrated into my existing production line?',
            'faq.q5.a': '<p>Yes — this is one of our most common project types. We conduct an on-site survey at your facility, analyze your production flow, validate the layout with <strong>3D simulation</strong>, and plan integration with your existing PLC infrastructure. Production downtime is kept to a minimum.</p>',
            'faq.q6.q': 'Do you provide technical support after commissioning?',
            'faq.q6.a': '<p>All projects include a <strong>24-month warranty</strong> + 24/7 phone and remote connection support. Periodic maintenance visits, spare parts supply, software updates, and operator refresher training are included. Annual maintenance contracts are optional.</p>',
            'faq.q7.q': 'Which industries do you serve?',
            'faq.q7.a': '<p>We serve the automotive sub-industry, household appliances, defense industry, metal processing, furniture industry, food, and chemical sectors. <strong>150+ completed projects, 80+ corporate clients</strong>.</p>',
            'faq.q8.q': 'What information should I prepare to request a quote?',
            'faq.q8.a': '<p>Basic information is sufficient for the first meeting. For a detailed quote: the part\'s <strong>3D model/technical drawing</strong>, target <strong>production capacity</strong>, current <strong>line layout plan</strong>, and shift preference. Even without these, please feel free to contact us.</p>',

            // Certifications Section
            'certs.eyebrow': 'STANDARDS &amp; CERTIFICATIONS',
            'certs.title': 'Production at international standards, audited quality',
            'certs.subtitle': 'All our systems are designed and documented in compliance with CE directives. Our production processes are managed under the ISO 9001 quality management standard.',
            'certs.ce.title': 'CE Certification',
            'certs.ce.text': 'Machinery 2006/42/EC, LVD and EMC directives',
            'certs.iso9001.title': 'ISO 9001:2015',
            'certs.iso9001.text': 'Quality Management System',
            'certs.iso13849.title': 'ISO 13849-1',
            'certs.iso13849.text': 'Machine safety (PL-d / PL-e)',
            'certs.en60204.title': 'EN 60204-1',
            'certs.en60204.text': 'Electrical equipment safety standard',
            'certs.tse.title': 'TSE Certified',
            'certs.tse.text': 'Domestic production approval certificate',
            'certs.iso14001.title': 'ISO 14001',
            'certs.iso14001.text': 'Environmental Management System'
        }
    };

    var STORAGE_KEY = 'hm_lang';
    var DEFAULT_LANG = 'tr';
    // Dil seçimi sessionStorage'da tutulur — tarayıcı kapatılınca TR'ye döner.
    // Aynı oturum içinde sayfa yenileme dilde değişiklik yapmaz.

    // === DB icerigi icin TR -> EN sozluk (genis) ===
    var TR_EN_DICT = {
        // ---- Cekirdek endustriyel ----
        'robotik': 'robotic', 'robotlu': 'robotic', 'robot': 'robot', 'robotun': 'robot', 'robotu': 'robot', 'robotlar': 'robots', 'robotları': 'robots',
        'kaynak': 'welding', 'kaynağı': 'welding', 'kaynaklı': 'welded', 'kaynakçı': 'welder', 'kaynama': 'welding', 'kaynayan': 'welding',
        'hücre': 'cell', 'hücresi': 'cell', 'hücreler': 'cells', 'hücreleri': 'cells', 'hücrede': 'in cell', 'hücrenin': 'cell',
        'sistem': 'system', 'sistemi': 'system', 'sistemler': 'systems', 'sistemleri': 'systems',
        'sistemde': 'in system', 'sisteme': 'to system', 'sistemin': 'system', 'sistemiyle': 'with system', 'sistemden': 'from system',
        'otomasyon': 'automation', 'otomasyonu': 'automation', 'otomasyonlu': 'automated', 'otomasyonun': 'automation',
        'otomatik': 'automatic', 'otomatikleştirilmiş': 'automated',
        'pres': 'press', 'presi': 'press', 'presli': 'press', 'presler': 'presses', 'presleri': 'presses',
        'hidrolik': 'hydraulic', 'pnömatik': 'pneumatic', 'pnomatik': 'pneumatic',
        'tasarım': 'design', 'tasarımı': 'design', 'tasarlanmış': 'designed', 'tasarlanan': 'designed', 'tasarlandı': 'designed',
        'üretim': 'production', 'üretimi': 'production', 'üretimde': 'in production', 'üretimin': 'production', 'üretimine': 'production',
        'hat': 'line', 'hattı': 'line', 'hatları': 'lines', 'hatlarına': 'lines', 'hattına': 'line', 'hattının': 'line',
        'makina': 'machine', 'makine': 'machine', 'makinası': 'machine', 'makinesi': 'machine', 'makinaları': 'machines', 'makineleri': 'machines',
        'mekanik': 'mechanical', 'elektrik': 'electrical', 'elektriksel': 'electrical', 'elektronik': 'electronic',
        'pano': 'panel', 'panosu': 'panel', 'panel': 'panel', 'paneli': 'panel', 'panelleri': 'panels',
        'entegrasyon': 'integration', 'entegrasyonu': 'integration', 'entegre': 'integrated',
        'programlama': 'programming', 'program': 'program', 'programı': 'program', 'programlanmış': 'programmed',
        'proje': 'project', 'projesi': 'project', 'projeler': 'projects', 'projeleri': 'projects',
        'özel': 'custom', 'özelleştirilmiş': 'customized', 'özellikli': 'featured',
        'çözüm': 'solution', 'çözümü': 'solution', 'çözümler': 'solutions', 'çözümleri': 'solutions',
        'müşteri': 'customer', 'müşterilerimiz': 'our customers', 'müşterinin': 'customer',
        'ihtiyacına': 'needs', 'ihtiyacınıza': 'your needs', 'ihtiyaç': 'need', 'ihtiyaçlar': 'needs', 'ihtiyaçlarına': 'needs',

        // ---- Operasyonlar ----
        'taşıma': 'handling', 'taşıyıcı': 'conveyor', 'taşıyan': 'carrying', 'taşır': 'carries',
        'yükleme': 'loading', 'yüklenme': 'loading', 'yüklenmesi': 'loading', 'yüklenir': 'loaded', 'yüklü': 'loaded',
        'boşaltma': 'unloading', 'boşaltılması': 'unloading', 'boşaltılır': 'unloaded',
        'paketleme': 'packaging', 'paketlenme': 'packaging', 'paletleme': 'palletizing',
        'kesme': 'cutting', 'kesim': 'cutting', 'kesici': 'cutter', 'delme': 'drilling',
        'açma': 'opening', 'kapama': 'closing', 'açık': 'open', 'kapalı': 'closed',
        'montaj': 'assembly', 'montajı': 'assembly', 'demontaj': 'disassembly',
        'kontrol': 'control', 'kontrollü': 'controlled', 'kontrolü': 'control', 'kontrolde': 'in control',
        'ölçüm': 'measurement', 'ölçümü': 'measurement', 'ölçme': 'measuring', 'ölçen': 'measuring',
        'görüntüleme': 'vision', 'görüntü': 'image', 'görsel': 'visual',
        'lazer': 'laser', 'lazerli': 'laser', 'punto': 'spot', 'ark': 'arc', 'mig': 'MIG', 'mag': 'MAG', 'tig': 'TIG',
        'çuval': 'bag', 'çuvalı': 'bag', 'çuvalları': 'bags', 'palet': 'pallet', 'paletli': 'palletized',
        'parça': 'part', 'parçaları': 'parts', 'parçalarının': 'parts', 'parçalı': 'parted',
        'kabin': 'cabinet', 'kabini': 'cabinet', 'kabinli': 'cabinet',
        'besleme': 'feeding', 'besler': 'feeds', 'beslenir': 'fed', 'beslemeli': 'fed',
        'işleme': 'processing', 'işlem': 'process', 'işlemi': 'process', 'işlemleri': 'processes', 'işlemden': 'from process',

        // ---- Niteleyiciler ----
        'endüstriyel': 'industrial', 'endüstri': 'industry', 'profesyonel': 'professional',
        'modern': 'modern', 'yeni': 'new', 'eski': 'old',
        'güvenli': 'safe', 'güvenlik': 'safety', 'güvenliği': 'safety', 'güvenliğini': 'safety', 'güvenliğinde': 'in safety',
        'hızlı': 'fast', 'yavaş': 'slow',
        'yüksek': 'high', 'düşük': 'low',
        'büyük': 'large', 'küçük': 'small',
        'tekrarlanabilir': 'repeatable', 'sürekli': 'continuous', 'kesintisiz': 'uninterrupted',
        'destekli': 'assisted', 'destek': 'support', 'destekleyen': 'supporting',
        'verimli': 'efficient', 'verimliliği': 'efficiency', 'verim': 'yield',
        'hassas': 'precise', 'hassasiyetli': 'high-precision', 'hassasiyet': 'precision',
        'modüler': 'modular', 'modülerlik': 'modularity',
        'standart': 'standard', 'standartlarında': 'at standards',
        'izlenebilir': 'traceable', 'izlenebilirlik': 'monitoring',
        'anahtar': 'key', 'teslim': 'turnkey',
        'plan': 'plan', 'planda': 'priority', 'planlı': 'planned', 'planlanan': 'planned',
        'uyumlu': 'compatible', 'uygun': 'suitable',
        'kompakt': 'compact', 'mobil': 'mobile',

        // ---- Eylemler ----
        'sağlar': 'provides', 'sağlayan': 'providing', 'sağlamak': 'providing', 'sağlanır': 'provided', 'sağlamaktadır': 'provides',
        'sunar': 'offers', 'sunulan': 'offered', 'sunulmaktadır': 'is offered', 'sunulur': 'is offered',
        'gerçekleştirir': 'performs', 'gerçekleştirilen': 'performed', 'tasarlar': 'designs',
        'artırılır': 'is increased', 'artırır': 'increases', 'arttırır': 'increases',
        'getirir': 'makes', 'olur': 'becomes', 'olan': 'being', 'olmak': 'being',
        'kullanılan': 'used', 'kullanılır': 'used', 'kullanım': 'use', 'kullanımı': 'use', 'kullanılarak': 'using',
        'yapma': 'performing', 'yapan': 'performing', 'yapılan': 'done', 'yapılır': 'done', 'yapılmış': 'done', 'yapılması': 'doing',
        'üretir': 'produces', 'üreten': 'producing', 'üretilen': 'produced',
        'çalışır': 'operates', 'çalışan': 'operating', 'çalışma': 'operating', 'çalıştırır': 'runs', 'çalıştırılır': 'run',
        'algılar': 'detects', 'algılayan': 'detecting', 'algılama': 'detection',
        'iletir': 'transmits', 'iletim': 'transmission',
        'bulunur': 'exists', 'bulunan': 'existing',

        // ---- Edat / baglac ----
        'için': 'for', 've': 'and', 'ile': 'with', 'veya': 'or', 'ya': 'or',
        'kadar': 'until', 'gibi': 'like', 'daha': 'more', 'en': 'most',
        'her': 'every', 'tüm': 'all', 'bütün': 'entire', 'bazı': 'some', 'birçok': 'many', 'birkaç': 'several',
        'sayesinde': 'thanks to', 'aracılığıyla': 'via', 'üzerinden': 'over',

        // ---- Yer / yon ----
        'üst': 'upper', 'alt': 'lower', 'ön': 'front', 'arka': 'rear',
        'sağ': 'right', 'sol': 'left',
        'iç': 'inner', 'dış': 'outer', 'merkez': 'center',

        // ---- Insan / kurum ----
        'mühendis': 'engineer', 'mühendislik': 'engineering', 'mühendislerimiz': 'our engineers',
        'imalat': 'manufacturing', 'imalatçı': 'manufacturer',
        'kurulum': 'installation', 'kurulumu': 'installation', 'kurulan': 'installed',
        'fabrika': 'factory', 'tesis': 'facility', 'tesisleri': 'facilities',
        'operatör': 'operator', 'operatörü': 'operator', 'operatörün': 'operator', 'kullanıcı': 'user',

        // ---- Markalar ----
        'kuka': 'KUKA', 'fanuc': 'FANUC', 'abb': 'ABB',
        'plc': 'PLC', 'hmi': 'HMI', 'ce': 'CE', 'iso': 'ISO',
        'siemens': 'Siemens', 'allen': 'Allen', 'bradley': 'Bradley',

        // ---- Süreç / proses ----
        'proses': 'process', 'süreç': 'process', 'süreci': 'process', 'sürecini': 'process', 'sürecinin': 'process',
        'uzaktan': 'remote', 'yakın': 'near', 'anlık': 'real-time', 'gerçek': 'real', 'zamanlı': 'time',
        'hale': '', 'şekilde': 'way', 'biçimde': 'way',
        'tipte': 'type', 'tipi': 'type', 'çeşitli': 'various', 'çeşit': 'type',

        // ---- Veri / bilgi ----
        'veri': 'data', 'verisi': 'data', 'veriler': 'data', 'verileri': 'data',
        'kayıt': 'record', 'kaydı': 'recording', 'kaydı': 'logging', 'kayıtları': 'records', 'kaydedilen': 'recorded',
        'rapor': 'report', 'raporu': 'report', 'raporlama': 'reporting', 'raporları': 'reports',
        'bilgi': 'information', 'bilgisi': 'information', 'bilgiler': 'information',
        'arayüz': 'interface', 'arayüzü': 'interface', 'arayüzleri': 'interfaces',
        'erişim': 'access', 'erişimi': 'access',
        'imkan': 'option', 'imkanı': 'option', 'imkanları': 'options',
        'izleme': 'monitoring', 'izlenir': 'monitored', 'gözlem': 'observation',

        // ---- Materyal ----
        'malzeme': 'material', 'malzemesi': 'material', 'malzemeli': 'material', 'malzemeler': 'materials',
        'metal': 'metal', 'metali': 'metal', 'çelik': 'steel', 'alüminyum': 'aluminum',
        'paslanmaz': 'stainless', 'demir': 'iron', 'bakır': 'copper',
        'sac': 'sheet', 'sacı': 'sheet', 'plastik': 'plastic', 'kompozit': 'composite',

        // ---- Aksam / ekipman ----
        'vana': 'valve', 'vanası': 'valve', 'silindir': 'cylinder', 'silindiri': 'cylinder',
        'ünite': 'unit', 'ünitesi': 'unit', 'üniteleri': 'units',
        'redüktör': 'reducer', 'motor': 'motor', 'motoru': 'motor', 'servo': 'servo', 'servomotor': 'servomotor',
        'konveyör': 'conveyor', 'konveyörü': 'conveyor', 'bant': 'belt', 'bantı': 'belt',
        'mil': 'shaft', 'mili': 'shaft', 'aks': 'shaft', 'kafa': 'head', 'gövde': 'body',
        'kapak': 'cover', 'kapağı': 'cover', 'mengene': 'vise', 'kelepçe': 'clamp',
        'bıçak': 'blade', 'bıçaklı': 'bladed', 'dişli': 'gear', 'dişliler': 'gears',
        'rulman': 'bearing', 'yatak': 'bearing',
        'sensör': 'sensor', 'sensörü': 'sensor', 'sensörleri': 'sensors', 'algılayıcı': 'sensor',
        'kablo': 'cable', 'kabloları': 'cables', 'kablosu': 'cable',
        'konnektör': 'connector', 'terminal': 'terminal', 'terminali': 'terminal',
        'bağlantı': 'connection', 'bağlantısı': 'connection', 'bağlantılı': 'connected',
        'eksen': 'axis', 'eksenli': 'axis', 'eksenleri': 'axes',
        'kapasite': 'capacity', 'kapasitesi': 'capacity',
        'önlem': 'precaution', 'önlemi': 'precaution', 'önlemler': 'precautions', 'önlemleri': 'measures',
        'müdahale': 'intervention', 'müdahalesi': 'intervention', 'mudahale': 'intervention',
        'ışık': 'light', 'ışıklı': 'lit', 'perde': 'curtain', 'perdesi': 'curtain', 'perdeleri': 'curtains',
        'ekran': 'screen', 'ekranı': 'screen', 'buton': 'button', 'düğme': 'button',
        'yapı': 'structure', 'yapısı': 'structure', 'yapısal': 'structural',
        'şasi': 'chassis', 'tabla': 'table', 'tablası': 'table', 'platform': 'platform',
        'değişim': 'change', 'değiştirme': 'replacement',
        'bakım': 'maintenance', 'bakımı': 'maintenance',
        'arıza': 'fault', 'arızası': 'fault', 'hata': 'error', 'hatası': 'error',
        'alarm': 'alarm', 'uyarı': 'warning',

        // ---- Olcum / fiziksel ----
        'basınç': 'pressure', 'basıncı': 'pressure',
        'sıcaklık': 'temperature', 'ısı': 'heat', 'soğutma': 'cooling', 'ısıtma': 'heating',
        'akış': 'flow', 'akışı': 'flow', 'akım': 'current', 'akımı': 'current',
        'voltaj': 'voltage', 'gerilim': 'voltage', 'frekans': 'frequency',
        'güç': 'power', 'gücü': 'power', 'enerji': 'energy', 'enerjisi': 'energy',
        'titreşim': 'vibration', 'gürültü': 'noise',
        'hız': 'speed', 'hızı': 'speed', 'devir': 'rpm',

        // ---- Tipler ----
        'detay': 'detail', 'detaylar': 'details', 'detayları': 'details',
        'özellik': 'feature', 'özellikleri': 'features', 'özellikleriyle': 'with features',
        'teknik': 'technical', 'teknik': 'technical',
        'resim': 'image', 'resimler': 'images', 'resimleri': 'images',
        'ürün': 'product', 'ürünü': 'product', 'ürünler': 'products', 'ürünlerimiz': 'our products',
        'video': 'video', 'fotoğraf': 'photo',
        'kapat': 'close', 'aç': 'open', 'iptal': 'cancel',

        // ---- Olcum birimleri / sayilar ----
        'metre': 'meter', 'milimetre': 'millimeter', 'santimetre': 'centimeter',
        'kilogram': 'kilogram', 'gram': 'gram', 'ton': 'ton',
        'saniye': 'second', 'dakika': 'minute', 'saat': 'hour', 'gün': 'day', 'hafta': 'week', 'ay': 'month', 'yıl': 'year',

        // ---- Fiil tipleri / yardimci ----
        'minimum': 'minimum', 'maksimum': 'maximum', 'optimum': 'optimum', 'ortalama': 'average',
        'maksimum': 'maximum',
        'azami': 'maximum', 'asgari': 'minimum',
        'önemli': 'important', 'gerekli': 'required', 'zorunlu': 'mandatory',
        'gelişmiş': 'advanced', 'ileri': 'advanced', 'temel': 'basic',
        'gerçek-zamanlı': 'real-time'
    };

    // Türkçe ek tanıma — bilinmeyen kelimenin sonundaki ekleri kaldırıp kökü ara
    var TR_SUFFIXES = [
        // En uzun ekten başla
        'lerinin', 'larının', 'lerinde', 'larında', 'lerinden', 'larından',
        'lerimiz', 'larımız', 'lerini', 'larını',
        'sının', 'sinin', 'sunun', 'sünün',
        'sında', 'sinde', 'sunda', 'sünde',
        'sından', 'sinden', 'sundan', 'sünden',
        'larla', 'lerle',
        'leri', 'ları', 'leri', 'ları',
        'lerden', 'lardan', 'lerde', 'larda', 'lere', 'lara',
        'lerin', 'ların',
        'lerce', 'larca',
        'liğin', 'lığın', 'luğun', 'lüğün',
        'liği', 'lığı', 'luğu', 'lüğü',
        'lik', 'lık', 'luk', 'lük',
        'mizden', 'nizden',
        'sını', 'sini', 'sunu', 'sünü',
        'siyle', 'sıyla', 'suyla', 'süyle',
        'siyle',
        'mek', 'mak', 'me', 'ma',
        'arak', 'erek',
        'yor',
        'ler', 'lar', 'len', 'lan',
        'siz', 'sız', 'suz', 'süz',
        'lı', 'li', 'lu', 'lü',
        'sı', 'si', 'su', 'sü',
        'nin', 'nın', 'nun', 'nün',
        'den', 'dan', 'ten', 'tan',
        'de', 'da', 'te', 'ta',
        'yle', 'yla', 'le', 'la',
        'ye', 'ya',
        'yi', 'yı', 'yu', 'yü',
        'in', 'ın', 'un', 'ün',
        'i', 'ı', 'u', 'ü',
        'e', 'a',
        'n', 'm', 's'
    ];
    // Uzunluğa göre sırala (en uzun ek önce)
    TR_SUFFIXES.sort(function (a, b) { return b.length - a.length; });

    // Sessiz değişimi: sonu ğ olan kelimeler (k → ğ), b → p, d → t, c → ç
    var CONSONANT_REVERSE = { 'ğ': 'k', 'b': 'p', 'd': 't', 'c': 'ç' };

    function lookupRoot(word) {
        if (TR_EN_DICT[word]) return TR_EN_DICT[word];
        // Sessiz değişimi geri al
        var last = word.charAt(word.length - 1);
        if (CONSONANT_REVERSE[last]) {
            var alt = word.substring(0, word.length - 1) + CONSONANT_REVERSE[last];
            if (TR_EN_DICT[alt]) return TR_EN_DICT[alt];
        }
        return null;
    }

    function translateUnknownWithSuffix(lower) {
        // En uzun ekten başlayarak dene
        for (var i = 0; i < TR_SUFFIXES.length; i++) {
            var suf = TR_SUFFIXES[i];
            if (lower.length > suf.length + 2 && lower.slice(-suf.length) === suf) {
                var root = lower.substring(0, lower.length - suf.length);
                var found = lookupRoot(root);
                if (found) return found;
            }
        }
        return null;
    }

    function translateText(text) {
        if (!text) return text;
        var lang = getLanguage();
        if (lang !== 'en') return text;
        return String(text).replace(/[A-Za-z0-9çğıöşüÇĞİÖŞÜ]+/g, function (word) {
            var lower = word.toLowerCase();
            var first = word.charAt(0);
            var isCapital = (first === first.toUpperCase() && first !== first.toLowerCase());
            var translated = null;

            // 1) Direkt sözlükte var mı?
            if (Object.prototype.hasOwnProperty.call(TR_EN_DICT, lower)) {
                translated = TR_EN_DICT[lower];
            } else {
                // 2) Ek kaldırarak köke ulaş
                translated = translateUnknownWithSuffix(lower);
            }

            if (translated === null || translated === undefined) return word;
            if (translated === '') return '';

            if (isCapital) {
                return translated.charAt(0).toUpperCase() + translated.slice(1);
            }
            return translated;
        }).replace(/\s{2,}/g, ' ').replace(/\s+([.,;!?])/g, '$1').trim();
    }

    function getLanguage() {
        try {
            // Önce sessionStorage'a bak (oturum içi seçim)
            var s = sessionStorage.getItem(STORAGE_KEY);
            if (s) return s;
            // Eski localStorage kayıtları varsa temizle (yeni oturumda TR ile başlasın)
            try { localStorage.removeItem(STORAGE_KEY); } catch (e) {}
            return DEFAULT_LANG;
        } catch (e) {
            return DEFAULT_LANG;
        }
    }

    function setLanguage(lang) {
        try {
            sessionStorage.setItem(STORAGE_KEY, lang);
            // Eski localStorage kalıntısı varsa temizle
            try { localStorage.removeItem(STORAGE_KEY); } catch (e) {}
        } catch (e) {}
        applyTranslations(lang);
        updateActiveButton(lang);
        document.documentElement.setAttribute('lang', lang);
        // Dinamik içerikler için event yayını
        try {
            document.dispatchEvent(new CustomEvent('hm-language-changed', { detail: { lang: lang } }));
        } catch (e) {
            // Eski tarayıcı fallback'i
            var ev = document.createEvent('CustomEvent');
            ev.initCustomEvent('hm-language-changed', true, true, { lang: lang });
            document.dispatchEvent(ev);
        }
    }

    function t(key) {
        var lang = getLanguage();
        var dict = translations[lang] || translations[DEFAULT_LANG];
        return dict[key] !== undefined ? dict[key] : key;
    }

    function applyTranslations(lang) {
        var dict = translations[lang] || translations[DEFAULT_LANG];

        // text-content
        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            var key = el.getAttribute('data-i18n');
            if (dict[key] !== undefined) {
                el.textContent = dict[key];
            }
        });

        // attribute (placeholder, title, alt)
        document.querySelectorAll('[data-i18n-attr]').forEach(function (el) {
            var spec = el.getAttribute('data-i18n-attr'); // "attr:key"
            var parts = spec.split(':');
            if (parts.length === 2 && dict[parts[1]] !== undefined) {
                el.setAttribute(parts[0], dict[parts[1]]);
            }
        });

        // HTML icin (icinde span olabilir)
        document.querySelectorAll('[data-i18n-html]').forEach(function (el) {
            var key = el.getAttribute('data-i18n-html');
            if (dict[key] !== undefined) {
                el.innerHTML = dict[key];
            }
        });
    }

    function updateActiveButton(lang) {
        document.querySelectorAll('.lang-btn').forEach(function (btn) {
            if (btn.getAttribute('data-lang') === lang) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }

    function init() {
        // Tikla event'i
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.lang-btn');
            if (btn) {
                e.preventDefault();
                var lang = btn.getAttribute('data-lang');
                if (lang && translations[lang]) {
                    setLanguage(lang);
                }
            }
        });

        // Sayfa yuklendiginde mevcut dili uygula
        var current = getLanguage();
        applyTranslations(current);
        updateActiveButton(current);
        document.documentElement.setAttribute('lang', current);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Dis erisim icin
    window.STMAKİNAI18n = {
        setLanguage: setLanguage,
        getLanguage: getLanguage,
        // Dinamik render sonrası tekrar uygulamak için
        apply: function () { applyTranslations(getLanguage()); },
        // Tek anahtar çevirisi
        t: t,
        // DB içeriği için kelime kelime çeviri (TR -> EN)
        translateText: translateText,
        translations: translations
    };
})();
