import { useState, useEffect, useRef } from 'react'
import { technologies } from '../../constants/technologies'
import '../../assets/styles/sections/Technologies.css'

export function Technologies() {
  const [hoveredTech, setHoveredTech] = useState(null)
  const [techVisible, setTechVisible] = useState(false)
  const techSectionRef = useRef(null)

  useEffect(() => {
    if (!techSectionRef.current) return

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            setTechVisible(true)
            observer.unobserve(entry.target)
          }
        })
      },
      { threshold: 0.2 }
    )

    observer.observe(techSectionRef.current)

    return () => observer.disconnect()
  }, [])

  return (
    <div
      id="tecnologias"
      className="container max-w-[1320px] mx-auto px-5 md:px-10 xl:px-5 pt-24 xl:pt-28 reveal"
      ref={techSectionRef}
    >
      <div className="w-full lg:flex space-y-6 lg:space-y-0">
        <div className="w-full lg:w-1/3 lg:pr-8">
          <h6 className="pl-[20px] relative font-outfit font-medium text-sm uppercase tracking-wider text-white/40 before:content-[''] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-[12px] before:h-[12px] before:rounded-full before:border-2 before:border-white/30">
            Stack Tecnológico
          </h6>
          <h2 className="font-outfit font-medium text-4xl md:text-5xl lg:text-6xl text-white mt-2">
            Tecno<span className="bg-themeGradient bg-clip-text text-transparent">logías</span>
          </h2>
          <p className="text-white/70 mt-4 leading-relaxed text-sm transition-all duration-300 pr-4">
            {hoveredTech || 'Pasa el cursor sobre un ícono para ver su descripción breve.'}
          </p>
        </div>
        <div className="w-full lg:w-2/3">
          <div className="bg-[#181A1C] rounded-2xl p-6 md:p-8 shadow-md shadow-black/15">
            <div className="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
              {technologies.map((tech, idx) => (
                <div
                  key={tech.name}
                  className={`tech-item ${techVisible ? 'show' : ''}`}
                  onMouseEnter={() => setHoveredTech(tech.desc)}
                  onMouseLeave={() => setHoveredTech(null)}
                  style={{ '--delay': `${idx * 0.05}s` }}
                >
                  <img
                    src={
                      tech.source === 'devicon'
                        ? `https://cdn.jsdelivr.net/gh/devicons/devicon/icons/${tech.logo}/${tech.logo}-original.svg`
                        : `https://cdn.simpleicons.org/${tech.logo}/${tech.color.replace('#', '')}`
                    }
                    alt={tech.name}
                    className="w-10 h-10 transition-all duration-300 group-hover:scale-110"
                    style={
                      tech.source === 'devicon' ? { filter: `drop-shadow(0 0 0 ${tech.color})` } : {}
                    }
                  />
                  <span className="text-white/60 text-[10px] font-outfit font-medium text-center group-hover:text-white/90 transition-colors duration-300">
                    {tech.name}
                  </span>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}
