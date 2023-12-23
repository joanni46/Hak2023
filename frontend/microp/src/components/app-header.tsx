//import styles
import styles from "./app-header.module.css";

//import Router
import { NavLink } from "react-router-dom";

//icons import
//  import likeActive from "../../assets/_active.svg";
import notificationInactive from "../assets/notification_inactive.svg";
import profileActive from "../assets/profile_active.svg";
import profileInactive from "../assets/profile_inactive.svg";
// import searchActive from "../../assets/search_active.svg";
// import searchInactive from "../../assets/search_inactive.svg";
import logo from "../assets/logo.png";
// import logoInactive from "../../assets/logo_inactive.svg";

import { FC } from "react";

const Header: FC = () => {
  return (
    <header className={styles.Header}>
      <nav className={styles.Navigation}>
        <NavLink to="/" className={styles.LogoBox}>
          <img src={logo} alt="logo" height={64} />
        </NavLink>
        <div className={styles.MenuBox}>
          <NavLink to="/booking" className={styles.Link}>
            {function favoritesLink({ isActive }: { isActive: boolean }) {
              return (
                <p
                  className={isActive ? styles.TextActive : styles.TextInactive}
                >
                  Запись
                </p>
              );
            }}
          </NavLink>
          <NavLink to="/streams" className={styles.Link}>
            {function favoritesLink({ isActive }: { isActive: boolean }) {
              return (
                <p
                  className={isActive ? styles.TextActive : styles.TextInactive}
                >
                  Трансляции
                </p>
              );
            }}
          </NavLink>
          <NavLink to="/schedule" className={styles.Link}>
            {function favoritesLink({ isActive }: { isActive: boolean }) {
              return (
                <p
                  className={isActive ? styles.TextActive : styles.TextInactive}
                >
                  Расписание
                </p>
              );
            }}
          </NavLink>
          <NavLink to="/surveys" className={styles.Link}>
            {function favoritesLink({ isActive }: { isActive: boolean }) {
              return (
                <p
                  className={isActive ? styles.TextActive : styles.TextInactive}
                >
                  Опросы
                </p>
              );
            }}
          </NavLink>
        </div>
        <div className={styles.ProfileBox}>
          <NavLink to="/notifications" className={styles.Link}>
            {function favoritesLink({ isActive }: { isActive: boolean }) {
              return (
                <img
                  src={isActive ? notificationInactive : notificationInactive}
                  alt="liked vacancies icon"
                  height={24}
                />
              );
            }}
          </NavLink>
          <NavLink to="/profile" className={styles.Link}>
            {function profileLink({ isActive }: { isActive: boolean }) {
              return (
                <div
                  className={
                    isActive
                      ? `${styles.Container} ${styles.Container_Active}`
                      : styles.Container
                  }
                >
                  <img
                    src={isActive ? profileActive : profileInactive}
                    alt="profile icon"
                    height={24}
                  />
                  {/* <p
                    className={
                      isActive
                        ? `${styles.LinkText} ${styles.LinkText_Active}`
                        : styles.LinkText
                    }
                  >
                    Profile
                  </p> */}
                </div>
              );
            }}
          </NavLink>
        </div>
      </nav>
    </header>
  );
};

export { Header };
