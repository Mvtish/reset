import { useScrollToTop } from '../../hooks/useScrollToTop'

export function ScrollToTop() {
  const { showTop, scrollTop } = useScrollToTop()

  return (
    <button
      aria-label="Scroll to top"
      onClick={scrollTop}
      className={`scrolltotop fixed right-5 bottom-5 xl:right-10 backdrop-blur transition-all ease-out duration-[120ms] cursor-pointer inline-block group w-[50px] h-[50px] rounded-full bg-white/15 text-white z-[1] overflow-hidden before:content-[''] before:absolute before:-z-[1] before:left-0 before:top-0 before:w-full before:h-full before:bg-themeGradient before:opacity-0 hover:before:opacity-20 before:transition-all before:ease-linear before:duration-100 ${
        showTop ? 'visible opacity-100 translate-y-0' : 'invisible opacity-0 translate-y-5'
      }`}
    >
      <i className="bi bi-arrow-up absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 group-hover:top-0 group-hover:invisible group-hover:opacity-0" />
      <i className="bi bi-arrow-up absolute top-full left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all ease-out duration-200 invisible opacity-0 group-hover:top-1/2 group-hover:visible group-hover:opacity-100" />
    </button>
  )
}
