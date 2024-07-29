document.addEventListener('DOMContentLoaded', () => {
    const audio = new Audio('audio1.mp3');
    audio.volume = 0.5; // تعديل مستوى الصوت حسب الحاجة

    // تشغيل الصوت عند دخول الصفحة
    audio.play();
});