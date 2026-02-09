import { personalInfo } from '../../constants/personalInfo'
import '../../assets/styles/sections/Contact.css'

export function Contact() {
  const handleSubmit = (e) => {
    e.preventDefault()
    // Aquí se integrará el backend más adelante
  }

  return (
    <div
      id="contact"
      className="container max-w-[1320px] mx-auto px-5 md:px-10 xl:px-5 pt-24 xl:pt-28 pb-24 reveal reveal-right"
    >
      <div className="w-full lg:flex space-y-6 lg:space-y-0">
        <div className="w-full lg:w-1/3">
          <h6 className="pl-[20px] relative font-outfit font-medium text-sm uppercase tracking-wider text-white/40 before:content-[''] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-[12px] before:h-[12px] before:rounded-full before:border-2 before:border-white/30">
            Contacto
          </h6>
          <h2 className="font-outfit font-medium text-4xl md:text-5xl lg:text-6xl text-white mt-2">
            Hablemos <span className="bg-themeGradient bg-clip-text text-transparent">Juntos</span>
          </h2>
        </div>
        <div className="w-full lg:w-2/3">
          <div className="flex">
            <div className="w-1/2">
              <h6 className="font-outfit font-medium uppercase text-sm tracking-wider text-white mb-2">
                Correo:
              </h6>
              <h3 className="font-outfit font-medium text-2xl lg:text-3xl text-white">
                {personalInfo.contact.email}
              </h3>
            </div>
            <div className="w-1/2">
              <h6 className="font-outfit font-medium uppercase text-sm tracking-wider text-white mb-2">
                Teléfono:
              </h6>
              <h3 className="font-outfit font-medium text-2xl lg:text-3xl text-white">
                {personalInfo.contact.phone}
              </h3>
            </div>
          </div>
          <div className="mt-8 lg:text-right">
            <form className="space-y-4" onSubmit={handleSubmit}>
              <div className="flex space-x-4">
                <div className="w-1/2">
                  <input
                    className="contact-input"
                    type="text"
                    name="name"
                    placeholder="Nombre"
                    required
                  />
                </div>
                <div className="w-1/2">
                  <input
                    className="contact-input"
                    type="email"
                    name="email"
                    placeholder="Correo"
                    required
                  />
                </div>
              </div>
              <input
                className="contact-input"
                type="text"
                name="subject"
                placeholder="Asunto"
                required
              />
              <textarea
                className="contact-input h/[160px]"
                name="message"
                placeholder="Mensaje"
              />
              <button className="contact-submit-btn" type="submit">
                <span
                  className="block relative text-transparent before:content-[attr(data-text)] before:absolute before:top-0 before:left-0 before:opacity-100 before:text-white before:transition-all before:ease-out before:duration-200 group-hover:before:-top-full group-hover:before:opacity-0 after:content-[attr(data-text)] after:absolute after:top-full after:left-0 after:opacity-0 after:text-white after:transition-all after:ease-out after:duration-200 group-hover:after:top-0 group-hover:after:opacity-100"
                  data-text="Enviar mensaje"
                >
                  Enviar mensaje
                </span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  )
}
