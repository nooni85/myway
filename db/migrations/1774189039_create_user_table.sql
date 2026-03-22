-- ==========================================================
-- 테이블명: users (사용자 계정 정보 저장)
-- ==========================================================

CREATE TABLE `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '시스템 내부 관리용 고유 번호 (PK)',
    `name` VARCHAR(100) NOT NULL COMMENT '사용자 실명 또는 표시 이름',
    `login_name` VARCHAR(50) NOT NULL COMMENT '로그인 시 사용하는 고유 식별 아이디',
    `nick_name` VARCHAR(50) DEFAULT NULL COMMENT '서비스 내에서 사용할 별명 (선택사항)',
    `email` VARCHAR(100) NOT NULL COMMENT '연락 및 비밀번호 찾기용 고유 이메일',
    `phone_number` VARCHAR(20) DEFAULT NULL COMMENT '사용자 전화번호 (입력값 검증 대상)',
    `password` VARCHAR(255) NOT NULL COMMENT '암호화(password_hash)된 비밀번호 데이터',
    `remember_token` VARCHAR(100) DEFAULT NULL COMMENT 'Remember Me 기능을 위한 세션 유지 토큰',
    `enabled` TINYINT(1) DEFAULT 1 COMMENT '계정 활성 여부 (1: 활성, 0: 차단/비활성)',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT '계정 생성 시각',
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '정보 최종 수정 시각',
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_login_name` (`login_name`) COMMENT '로그인 아이디 중복 방지',
    UNIQUE KEY `uk_email` (`email`) COMMENT '이메일 주소 중복 방지',
    INDEX `idx_remember_token` (`remember_token`) COMMENT '토큰 기반 자동 로그인 검색 최적화'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='사용자 기본 정보 및 인증 상태 관리 테이블';
