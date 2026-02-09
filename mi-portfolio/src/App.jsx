import { useRevealOnScroll } from './hooks/useRevealOnScroll'
import { Header } from './components/layout/Header'
import { ScrollToTop } from './components/layout/ScrollToTop'
import { Hero } from './components/sections/Hero'
import { Services } from './components/sections/Services'
import { SpecialtiesSlider } from './components/sections/SpecialtiesSlider'
import { Technologies } from './components/sections/Technologies'
import { Portfolio } from './components/sections/Portfolio'
import { Contact } from './components/sections/Contact'
import 'bootstrap-icons/font/bootstrap-icons.css'
import './assets/styles/animations.css'
import './assets/styles/components.css'

function App() {
  useRevealOnScroll()

  return (
    <div className="bg-black font-opensans overflow-x-hidden">
      <Header />

      <div className="container mx-auto max-w-[1320px] px-5 md:px-10 xl:px-5">
        <Hero />
        <Services />
        <SpecialtiesSlider />
      </div>

      <Technologies />

      <Portfolio />

      <Contact />

      <ScrollToTop />
    </div>
  )
}

export default App
