import { useRef } from 'react'
import { Swiper, SwiperSlide } from 'swiper/react'
import { Navigation, Autoplay } from 'swiper/modules'
import { projects } from '../../constants/projects'
import 'swiper/css'
import 'swiper/css/navigation'
import '../../assets/styles/sections/Portfolio.css'

export function Portfolio() {
  const portfolioPrev = useRef(null)
  const portfolioNext = useRef(null)

  return (
    <div id="portfolio" className="px-5 lg:px-10 mt-24 xl:mt-28 reveal reveal-left">
      <div className="bg-darkBg rounded-2xl overflow-hidden py-20">
        <div className="container mx-auto max-w-[1320px] px-5">
          <div className="md:w-4/5 lg:w-3/4 md:mx-auto">
            <h6 className="pl-[20px] relative font-outfit font-medium text-sm uppercase tracking-wider text-white/40 before:content-[''] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-[12px] before:h-[12px] before:rounded-full before:border-2 before:border-white/30">
              Portafolio
            </h6>
            <h2 className="font-outfit font-medium text-4xl md:text-5xl lg:text-6xl text-white mt-2">
              Proyectos <span className="bg-themeGradient bg-clip-text text-transparent">Recientes</span>
            </h2>
            <p className="leading-[1.75] text-white/70 mt-3">
              Pronto más detalles aquí. Por ahora, puedes ver algunos trabajos destacados en el carrusel.
            </p>
            <div className="space-x-1 mt-6">
              <div ref={portfolioPrev} className="portfolio-nav-btn swiper-portfolio-prev">
                <i className="bi bi-arrow-left absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 group-hover:top-0 group-hover:invisible group-hover:opacity-0" />
                <i className="bi bi-arrow-left absolute top-full left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 invisible opacity-0 group-hover:top-1/2 group-hover:visible group-hover:opacity-100" />
              </div>
              <div ref={portfolioNext} className="portfolio-nav-btn swiper-portfolio-next">
                <i className="bi bi-arrow-right absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 group-hover:top-0 group-hover:invisible group-hover:opacity-0" />
                <i className="bi bi-arrow-right absolute top-full left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 invisible opacity-0 group-hover:top-1/2 group-hover:visible group-hover:opacity-100" />
              </div>
            </div>
          </div>

          <Swiper
            modules={[Navigation, Autoplay]}
            slidesPerView={1}
            spaceBetween={30}
            autoplay={{ delay: 3000, disableOnInteraction: false }}
            navigation={{ prevEl: portfolioPrev.current, nextEl: portfolioNext.current }}
            onBeforeInit={(swiper) => {
              swiper.params.navigation.prevEl = portfolioPrev.current
              swiper.params.navigation.nextEl = portfolioNext.current
            }}
            breakpoints={{ 1024: { slidesPerView: 2 } }}
            className="portfolio-slider overflow-visible mt-6 xl:mt-14"
          >
            {projects.map((item) => (
              <SwiperSlide key={item.slug}>
                <div className="group/portfolio-box">
                  <div className="overflow-hidden relative rounded-2xl">
                    <a
                      className="group block relative before:content-[''] before:z-[1] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-themeGradient before:opacity-0 hover:before:opacity-10 before:transition-all before:ease-linear before:duration-100"
                      href="#"
                    >
                      <img
                        className="group-hover:scale-105 transition ease-custom duration-500"
                        src={item.img}
                        alt={item.title}
                      />
                    </a>
                  </div>
                  <div className="pt-6">
                    <ul className="text-white font-outfit font-medium uppercase text-sm tracking-wider">
                      {[0, 1, 2].map((idx) => (
                        <li
                          key={idx}
                          className={`list-none inline-block leading-none ${
                            idx === 0
                              ? 'pr-[4px]'
                              : "relative pl-[14px] pr-[4px] before:content-[''] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-[5px] before:h-[5px] before:rounded-md before:bg-white/80"
                          }`}
                        >
                          <a className="inline-block overflow-hidden" href="#">
                            <span
                              className="block relative text-transparent before:content-[attr(data-text)] before:absolute before:top-0 before:left-0 before:opacity-100 before:text-white before:transition-all before:ease-out before:duration-200 hover:before:-top-full hover:before:opacity-0 after:content-[attr(data-text)] after:absolute after:top-full after:left-0 after:opacity-0 after:text-white after:transition-all after:ease-out after:duration-200 hover:after:top-0 hover:after:opacity-100"
                              data-text="Categoría"
                            >
                              Categoría
                            </span>
                          </a>
                        </li>
                      ))}
                    </ul>
                    <div className="mt-2">
                      <h2 className="relative font-outfit font-medium text-3xl">
                        <a
                          className="text-white group-hover/portfolio-box:pl-[44px] transition-all ease-out duration-200"
                          href="#"
                        >
                          <span className="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-1/2 opacity-0 group-hover/portfolio-box:opacity-100 group-hover/portfolio-box:-translate-x-0 transition duration-100">
                            <i className="bi bi-arrow-right" />
                          </span>
                          {item.title}
                        </a>
                      </h2>
                    </div>
                  </div>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </div>
    </div>
  )
}
