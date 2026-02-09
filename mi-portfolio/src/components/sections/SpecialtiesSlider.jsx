import { Swiper, SwiperSlide } from 'swiper/react'
import { Autoplay } from 'swiper/modules'
import { specialties } from '../../constants/specialties'
import 'swiper/css'
import '../../assets/styles/sections/SpecialtiesSlider.css'

export function SpecialtiesSlider() {
  return (
    <Swiper
      modules={[Autoplay]}
      slidesPerView={2}
      breakpoints={{ 768: { slidesPerView: 3 }, 1024: { slidesPerView: 5 } }}
      spaceBetween={24}
      autoplay={{ delay: 2500, disableOnInteraction: false }}
      className="clients-slider pt-24 xl:pt-28 pb-24 xl:pb-28 reveal reveal-scale"
    >
      {specialties.map((item) => (
        <SwiperSlide key={item.id}>
          <div className="specialty-card">
            <div
              className="specialty-card__glow"
              style={{ background: `radial-gradient(circle at center, ${item.color}10, transparent 70%)` }}
            ></div>
            <div className="specialty-card__content">
              <i
                className={`${item.icon} text-5xl mb-3 inline-block transition-transform duration-300 ease-in-out will-change-transform group-hover:scale-105`}
                style={{ color: item.color }}
              ></i>
              <p className="text-white/70 group-hover:text-white/90 font-outfit text-sm font-medium transition-colors duration-300 ease-in-out">
                {item.text}
              </p>
            </div>
            <div className="specialty-card__border"></div>
          </div>
        </SwiperSlide>
      ))}
    </Swiper>
  )
}
