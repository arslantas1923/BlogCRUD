# Blog Crud

Bu proje, **[Blog Crud]** adı altında bir Laravel uygulamasıdır. Kayıt olan kullanıcıların kolayca gönderi ve kategori oluşturmasına olanak tanır. Eterna Teknoloji için Mustafa ARSLANTAŞ tarafından hazırlanmıştır.

## Başlangıç

### Gereksinimler

- PHP >= 7.3
- Composer
- MySQL veya başka bir veritabanı yönetim sistemi

### Kurulum

#### 1. Projeyi İndirin

Projenizi GitHub üzerinden veya doğrudan zip dosyası olarak indirebilirsiniz.

**Git ile Klonlama:**
```bash
git clone https://github.com/arslantas1923/BlogCRUD.git
cd BlogCRUD
```

**Zip Dosyası ile İndirme:**
1. GitHub sayfasına gidin.
2. "Code" butonuna tıklayın.
3. "Download ZIP" seçeneğini seçin ve dosyayı bilgisayarınıza çıkarın.


#### 3. Çevresel Ayarları Yapılandırın

`.env` dosyasını düzenleyin ve veritabanı ayarlarını yapılandırın:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=veritabani_adi
DB_USERNAME=kullanici_adi
DB_PASSWORD=sifre
```

#### 4. Veritabanını Oluşturun

Veritabanı oluşturmak için aşağıdaki komutu kullanarak migration'ları çalıştırın:

php artisan migrate


#### 5. Örnek Verileri Yükleyin

Veritabanınıza örnek verileri eklemek için `db.sql` dosyasını import etmeniz gerekmektedir. Bu dosya, proje dizininde bulunmaktadır.

**Veritabanına SQL dosyasını import etme:**
```bash
mysql -u kullanici_adi -p veritabani_adi < db.sql
```

## Özellikler

- Kullanıcıların gönderi oluşturması.
- Kullanıcıların kategoriler oluşturması.
- Kategorilere göre gönderi görüntüleme.
- Kullanıcılar için oturum açma ve kayıt olma.
- Kullanıcı dostu arayüz.
