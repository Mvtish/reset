import { services } from '../../constants/services'
import '../../assets/styles/sections/Services.css'

export function Services() {
  return (
    <div id="services" className="w-full lg:flex py-24 xl:py-28 space-y-6 lg:space-y-0 reveal reveal-right">
      <div className="w-full lg:w-1/3">
        <h6 className="pl-[20px] relative font-outfit font-medium text-sm uppercase tracking-wider text-white/40 before:content-[''] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-[12px] before:h-[12px] before:rounded-full before:border-2 before:border-white/30">
          Servicios
        </h6>
        <h2 className="font-outfit font-medium text-4xl md:text-5xl lg:text-6xl text-white mt-2">
          Lo Que <span className="bg-themeGradient bg-clip-text text-transparent">Hago</span>
        </h2>
      </div>
      <div className="w-full lg:w-2/3 space-y-6">
        {services.map((item) => (
          <div
            key={item.num}
            className="service-card"
          >
            <div className="md:w-[15%] text-white">
              <span className="font-outfit text-2xl xl:text-3xl font-medium">{item.num}/</span>
            </div>
            <div className="md:w-[40%] text-white">
              <i className={`${item.icon} text-3xl`} />
              <h3 className="inline-flex pl-3 font-outfit font-medium text-2xl xl:text-3xl">
                {item.title}
              </h3>
            </div>
            <div className="md:w-[45%] md:pr-4">
              <p className="text-white/70">{item.desc}</p>
            </div>
          </div>
        ))}
      </div>
    </div>
  )
}
