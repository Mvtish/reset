import { useState, useEffect, useRef } from 'react'

export function useHeaderVisibility() {
  const [hideHeader, setHideHeader] = useState(false)
  const lastScrollY = useRef(0)

  useEffect(() => {
    const handleScroll = () => {
      const current = window.scrollY

      if (current > 120 && current > lastScrollY.current) {
        setHideHeader(true)
      } else {
        setHideHeader(false)
      }
      lastScrollY.current = current
    }

    window.addEventListener('scroll', handleScroll)
    handleScroll()

    return () => window.removeEventListener('scroll', handleScroll)
  }, [])

  return hideHeader
}
