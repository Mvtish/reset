import { useState } from 'react'
import { useHeaderVisibility } from '../../hooks/useHeaderVisibility'
import '../../assets/styles/layout/Header.css'

const menuItems = [
  { id: 'about', label: 'Sobre mí' },
  { id: 'services', label: 'Servicios' },
  { id: 'tecnologias', label: 'Tecnologías' },
  { id: 'portfolio', label: 'Portafolio' },
  { id: 'contact', label: 'Contacto' }
]

export function Header() {
  const [navOpen, setNavOpen] = useState(false)
  const hideHeader = useHeaderVisibility()

  return (
    <div className={`header ${hideHeader ? 'header--hidden' : ''}`}>
      <div className="container mx-auto max-w-[1600px] px-5 md:px-10">
        <div className="flex justify-between relative">
          <a href="#about" className="text-3xl font-outfit font-medium text-white">
            Home
          </a>
          <div>
            <ul className="space-x-2">
              <li className="list-none inline-block">
                <a
                  className="inline-flex items-center gap-2 px-5 py-2.5 bg-[#1a1a1a] hover:bg-[#252525] text-white font-outfit rounded-full uppercase text-xs font-medium tracking-widest transition-colors"
                  href="#contact"
                >
                  HABLEMOS
                  <span className="w-1.5 h-1.5 rounded-full bg-white" />
                </a>
              </li>
              <li className="list-none inline-block">
                <button
                  onClick={() => setNavOpen((v) => !v)}
                  className="inline-flex items-center gap-2 px-5 py-2.5 bg-white hover:bg-gray-100 text-black font-outfit rounded-full uppercase text-xs font-medium tracking-widest transition-colors"
                >
                  MENÚ
                  <span className="w-1.5 h-1.5 rounded-full bg-black" />
                </button>
              </li>
            </ul>
          </div>

          {/* Toggle Menu */}
          <nav className={`nav-box ${navOpen ? 'nav-box--open' : ''}`}>
            <ul className="space-y-[10px]">
              {menuItems.map((item) => (
                <li key={item.id} className="list-none">
                  <a
                    className="text-white block relative hover:pl-[26px] transition-all ease-out duration-300 group"
                    href={`#${item.id}`}
                    onClick={() => setNavOpen(false)}
                  >
                    <i className="bi bi-arrow-right absolute top-1/2 left-0 -translate-y-1/2 opacity-0 invisible transition-all ease-linear duration-100 group-hover:opacity-100 group-hover:visible" />
                    {item.label}
                  </a>
                </li>
              ))}
            </ul>
          </nav>
        </div>
      </div>
    </div>
  )
}
