import { personalInfo } from '../../constants/personalInfo'
import '../../assets/styles/sections/Hero.css'

export function Hero() {
  return (
    <>
      {/* Hero section */}
      <div id="about" className="py-24 md:py-28 xl:py-32 text-center reveal">
        <h1 className="text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-outfit font-bold stroke-text">
          {personalInfo.name}
        </h1>
      </div>

      {/* About section */}
      <div className="lg:flex space-y-8 lg:space-y-0 reveal reveal-left">
        <div className="w-full lg:w-1/3 lg:order-2 text-center">
          <img
            className="inline-block w-[240px] h-[240px] md:w-[270px] md:h-[270px] xl:w-[320px] xl:h-[320px] rounded-full"
            src={personalInfo.avatar}
            alt="hero avatar"
          />
        </div>

        <div className="w-full lg:w-1/3 lg:order-1 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-1 gap-6 lg:gap-8">
          <div>
            <h6 className="font-outfit font-medium tracking-wider uppercase text-sm text-white mb-2">
              Biografía
            </h6>
            <p className="text-white/70 leading-[1.75]">{personalInfo.biography}</p>
          </div>

          <div>
            <h6 className="font-outfit font-medium tracking-wider uppercase text-sm text-white mb-2">
              Habilidades
            </h6>
            <ul className="text-white/70">
              {personalInfo.skills.map((skill, idx) => (
                <li
                  key={skill}
                  className={`list-none inline-block ${
                    idx === 0
                      ? 'pr-[4px]'
                      : "relative pl-[14px] pr-[4px] before:content-[''] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-[5px] before:h-[5px] before:rounded-md before:bg-white/80"
                  }`}
                >
                  {skill}
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h6 className="font-outfit font-medium tracking-wider uppercase text-sm text-white mb-2">
              Redes
            </h6>
            <ul className="space-x-1">
              {personalInfo.socialLinks.map((social) => (
                <li key={social.icon} className="list-none inline-block">
                  <a
                    className="inline-block group w-[44px] h-[44px] rounded-full bg-white/15 text-white relative z-[1] overflow-hidden before:content-[''] before:absolute before:-z-[1] before:left-0 before:top-0 before:w-full before:h-full before:bg-themeGradient before:opacity-0 hover:before:opacity-20 before:transition-all before:ease-linear before:duration-100"
                    href={social.url}
                  >
                    <i
                      className={`bi bi-${social.icon} absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 group-hover:top-0 group-hover:invisible group-hover:opacity-0`}
                    />
                    <i
                      className={`bi bi-${social.icon} absolute top-full left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 invisible opacity-0 group-hover:top-1/2 group-hover:visible group-hover:opacity-100`}
                    />
                  </a>
                </li>
              ))}
            </ul>
          </div>
        </div>

        <div className="w-full lg:w-1/3 order-3 flex flex-col items-start lg:items-end justify-start space-y-6">
          {/* Badge Disponible */}
          {personalInfo.isAvailable && (
            <div className="inline-flex items-center gap-2 px-4 py-2 bg-green-500/20 border border-green-500/50 rounded-full backdrop-blur-sm">
              <span className="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
              <span className="text-green-400 font-outfit text-sm font-medium">
                Disponible para trabajar
              </span>
            </div>
          )}

          {/* Botones CTA */}
          <div className="flex flex-col gap-4 w-full max-w-[280px]">
            <a
              href="#"
              download
              className="group relative inline-flex items-center justify-center gap-3 px-6 py-3 bg-white hover:bg-gray-100 text-black font-outfit font-medium text-sm uppercase tracking-wider rounded-full transition-all duration-300 overflow-hidden"
            >
              <i className="bi bi-download text-lg"></i>
              <span>Descargar CV</span>
              <div className="absolute inset-0 bg-themeGradient opacity-0 group-hover:opacity-10 transition-opacity"></div>
            </a>

            <a
              href="#portfolio"
              className="group relative inline-flex items-center justify-center gap-3 px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-outfit font-medium text-sm uppercase tracking-wider rounded-full transition-all duration-300 border border-white/20 backdrop-blur-sm overflow-hidden"
            >
              <i className="bi bi-grid-3x3-gap text-lg"></i>
              <span>Ver Proyectos</span>
              <div className="absolute inset-0 bg-themeGradient opacity-0 group-hover:opacity-20 transition-opacity"></div>
            </a>
          </div>

          {/* Mini Stats */}
          <div className="text-left lg:text-right space-y-3 mt-4">
            {personalInfo.stats.map((stat) => (
              <div
                key={stat.text}
                className="flex items-center justify-start lg:justify-end gap-2 text-white/70"
              >
                <i className={`${stat.icon} text-xl`}></i>
                <span className="text-sm">{stat.text}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </>
  )
}
