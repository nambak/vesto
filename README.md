# AI Fashion Mall 🛍️✨

*차세대 AI 기반 협업형 패션 쇼핑몰*

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-4.x-F59E0B?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJMMTMuMDkgOC4yNkwyMCA5TDEzLjA5IDE1Ljc0TDEyIDIyTDEwLjkxIDE1Ljc0TDQgOUwxMC45MSA4LjI2TDEyIDJaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K)](https://filamentphp.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-4E56A6?style=for-the-badge&logo=livewire&logoColor=white)](https://livewire.laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)

## 🌟 프로젝트 소개

AI Fashion Mall은 인공지능과 실시간 협업 기술을 결합한 차세대 패션 쇼핑몰입니다. 개인 맞춤형 스타일 분석부터 친구들과의 공유 쇼핑까지, 완전히 새로운 쇼핑 경험을 제공합니다.

### 🎯 핵심 가치
- **개인화**: AI 기반 스타일 DNA 분석으로 나만의 맞춤 추천
- **협업**: 실시간으로 함께하는 소셜 쇼핑 경험
- **성장**: 지속적인 스타일 진화와 학습

## 🚀 주요 기능

### 🤝 협업형 쇼핑 (Real-time Collaboration)
- **공유 장바구니**: 가족이나 친구들과 실시간 장바구니 공유
- **라이브 쇼핑 세션**: 동시 접속으로 함께 보고, 채팅하며 쇼핑
- **위시리스트 협업**: 선물 구매 시 실시간 위시리스트 연동

### 🧬 AI 스타일 DNA 분석
- **온보딩 퀴즈**: 20개 문항 기반 스타일 성향 파악
- **사진 분석**: 기존 옷장 사진으로 선호 스타일 학습
- **체형 분석**: 셀프 측정 가이드로 최적 핏 계산

### 🎨 실시간 코디 추천
- **라이브와이어 기반**: 실시간 상품 조합 추천
- **상황별 매칭**: 면접, 데이트, 여행 등 TPO 맞춤 코디
- **날씨 연동**: 실시간 날씨 API 기반 코디 제안

### 👗 가상 피팅 시뮬레이터
- **사이즈 예측**: 구매/반품 데이터 기반 정확한 사이즈 추천
- **색상 매칭**: 개인 피부톤 분석으로 색상 필터링
- **스타일 믹스매치**: 보유 아이템과 신상품 조합 제안

## 🎨 차별화 기능

### 🗂️ 옷장 정리사 모드
- 기존 보유 아이템 스캔 및 분석
- 안 입는 옷 중고거래 연동 판매 제안
- 부족한 베이직 아이템 자동 추천

### 📅 상황별 코디북
- 다양한 상황별 맞춤 코디 제안
- 개인 캘린더와 연동한 자동 코디 추천
- 계절별, 트렌드별 스타일 가이드

### 📊 스타일 성장 트래킹
- 구매 이력 기반 스타일 변화 시각화
- "1년 전 vs 지금" 스타일 진화 분석
- 개인 맞춤 스타일 성장 로드맵

### 👥 소셜 스타일링
- 유사 체형/취향 유저 코디 참고
- 스타일 인플루언서 매칭 시스템
- 커뮤니티 기반 코디 평가 및 추천

## 🛠️ 기술 스택

### Backend
- **Laravel 11.x**: 최신 PHP 프레임워크
- **PHP 8.2+**: 최신 PHP 성능 및 기능 활용
- **MySQL 8.0**: 관계형 데이터베이스
- **Redis**: 캐싱 및 세션 관리

### Frontend & Admin
- **Filament 4.x**: 현대적인 관리자 패널
- **Livewire 3.x**: 실시간 인터랙션
- **Alpine.js**: 경량 JavaScript 프레임워크
- **Tailwind CSS**: 유틸리티 기반 CSS 프레임워크

### Real-time Features
- **Laravel Echo**: WebSocket 통신
- **Pusher/Soketi**: 실시간 브로드캐스팅
- **Laravel Reverb**: 실시간 WebSocket 서버

### AI & Machine Learning
- **OpenAI GPT API**: 스타일 분석 및 추천
- **TensorFlow.js**: 클라이언트사이드 이미지 분석
- **Computer Vision API**: 의류 및 색상 인식

### Payment & Integration
- **Stripe/Toss Payments**: 결제 시스템
- **iamport**: 국내 결제 모듈
- **OpenWeather API**: 날씨 정보
- **Google Calendar API**: 일정 연동

## 📋 시스템 요구사항

```bash
PHP >= 8.2
Composer >= 2.0
Node.js >= 18.0
NPM >= 9.0
MySQL >= 8.0
Redis >= 6.0
```

## 🚀 설치 및 실행

### 1. 프로젝트 클론
```bash
git clone https://github.com/nambak/vesto.git
cd vesto
```

### 2. 의존성 설치
```bash
# PHP 의존성 설치
composer install

# Node.js 의존성 설치
npm install
```

### 3. 환경 설정
```bash
# 환경 파일 복사
cp .env.example .env

# 애플리케이션 키 생성
php artisan key:generate

# 데이터베이스 설정 (.env 파일 수정)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vesto
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. 데이터베이스 마이그레이션
```bash
php artisan migrate --seed
```

### 5. Filament 관리자 계정 생성
```bash
php artisan make:filament-user
```

### 6. 에셋 빌드
```bash
npm run build
# 개발 환경에서는
npm run dev
```

### 7. 애플리케이션 실행
```bash
php artisan serve
```

## 🗂️ 프로젝트 구조

```
vesto/
├── app/
│   ├── Filament/           # Filament 관리자 패널
│   ├── Http/
│   │   └── Livewire/       # Livewire 컴포넌트
│   ├── Models/             # Eloquent 모델
│   ├── Services/           # 비즈니스 로직
│   │   ├── AI/             # AI 분석 서비스
│   │   ├── Payment/        # 결제 서비스
│   │   └── Recommendation/ # 추천 시스템
│   └── Events/             # 실시간 이벤트
├── database/
│   ├── migrations/         # 데이터베이스 마이그레이션
│   └── seeders/           # 시드 데이터
├── resources/
│   ├── views/
│   │   └── livewire/       # Livewire 뷰
│   └── js/                 # JavaScript 파일
└── routes/
    ├── web.php
    └── api.php
```

## 🔧 주요 설정

### Filament 관리자 패널 설정
```php
// config/filament.php
return [
    'path' => 'admin',
    'domain' => null,
    'middleware' => ['web', 'auth:filament'],
    // ...
];
```

### Livewire 실시간 설정
```php
// config/livewire.php
return [
    'class_namespace' => 'App\\Http\\Livewire',
    'view_path' => resource_path('views/livewire'),
    'temporary_file_upload' => [
        'disk' => 's3',
        'rules' => ['file', 'max:102400'], // 100MB
    ],
];
```

## 📱 API 엔드포인트

### 인증
- `POST /api/auth/login` - 로그인
- `POST /api/auth/register` - 회원가입
- `POST /api/auth/logout` - 로그아웃

### 상품 관리
- `GET /api/products` - 상품 목록
- `GET /api/products/{id}` - 상품 상세
- `POST /api/products` - 상품 등록 (관리자)

### AI 분석
- `POST /api/style-analysis` - 스타일 DNA 분석
- `POST /api/recommend` - 개인 맞춤 추천
- `POST /api/virtual-fitting` - 가상 피팅

### 협업 기능
- `POST /api/shared-cart/{cartId}/join` - 공유 장바구니 참여
- `GET /api/live-session/{sessionId}` - 라이브 쇼핑 세션
- `POST /api/wishlist/share` - 위시리스트 공유

## 🎨 UI/UX 컴포넌트

### Livewire 컴포넌트
- `ProductRecommendation` - 실시간 상품 추천
- `SharedCart` - 공유 장바구니
- `LiveShoppingSession` - 라이브 쇼핑
- `StyleAnalyzer` - 스타일 분석기
- `VirtualFitting` - 가상 피팅

### Filament 리소스
- `ProductResource` - 상품 관리
- `OrderResource` - 주문 관리
- `UserResource` - 회원 관리
- `InventoryResource` - 재고 관리
- `StyleAnalyticsResource` - 스타일 분석 데이터

## 🧪 테스트

```bash
# 전체 테스트 실행
php artisan test

# 특정 테스트 실행
php artisan test --filter=ProductTest

# 커버리지 리포트 생성
php artisan test --coverage
```

## 🚀 배포

### 프로덕션 환경 설정
```bash
# 환경 최적화
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 에셋 빌드
npm run build
```

### Docker 배포 (선택사항)
```bash
# Docker 컨테이너 실행
docker-compose up -d

# 데이터베이스 마이그레이션
docker-compose exec app php artisan migrate
```

## 🤝 기여하기

1. 프로젝트를 포크합니다
2. 피처 브랜치를 생성합니다 (`git checkout -b feature/AmazingFeature`)
3. 변경사항을 커밋합니다 (`git commit -m 'Add some AmazingFeature'`)
4. 브랜치에 푸시합니다 (`git push origin feature/AmazingFeature`)
5. Pull Request를 생성합니다

## 📝 라이선스

이 프로젝트는 MIT 라이선스 하에 배포됩니다. 자세한 내용은 [LICENSE](LICENSE) 파일을 참고하세요.

## 📞 지원 및 문의

- **이슈 리포트**: [GitHub Issues](https://github.com/nambak/vesto/issues)
- **이메일**: nambak8@gmail.com
- **문서**: [Documentation Wiki](https://github.com/nambak/vesto/wiki)

## 🎯 로드맵

### v1.0 (현재)
- [x] 기본 쇼핑몰 기능
- [x] Filament 관리자 패널
- [x] 실시간 협업 기능

### v1.1 (계획)
- [ ] 고급 AI 추천 알고리즘
- [ ] 모바일 앱 개발
- [ ] 소셜 미디어 연동

### v2.0 (미래)
- [ ] AR 가상 피팅
- [ ] 글로벌 다국어 지원
- [ ] 블록체인 기반 인증 시스템

---

**Made with ❤️ by AI Fashion Mall Team**

*"패션의 미래, 지금 경험하세요"*
