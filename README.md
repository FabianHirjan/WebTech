# iDIS
Hirjan Fabian - E1, Iftime Cristina - E1


# Software Requirements Specification
## For  <project name>
Version 1.0 approved
Prepared by <Hirjan Fabian, Iftime Cristina>
<organization>

Table of Contents
=================
  * [Revision History](#revision-history)
  * [Introduction](#1-introduction)
    * 1.1 [Purpose](#11-purpose)
    * 1.2 [Document Conventions](#12-document-conventions)
    * 1.3 [Intended Audience and Reading Suggestions](#13-intended-audience-and-reading-suggestions)
    * 1.4 [Product Scope](#14-product-scope)
    * 1.5 [References](#15-references)
  * [Overall Description](#overall-description)
    * 2.1 [Product Perspective](#21-product-perspective)
    * 2.2 [Product Functions](#22-product-functions)
    * 2.3 [User Classes and Characteristics](#23-user-classes-and-characteristics)
    * 2.4 [Operating Environment](#24-operating-environment)
    * 2.5 [Design and Implementation Constraints](#25-design-and-implementation-constraints)
    * 2.6 [User Documentation](#26-user-documentation)
    * 2.7 [Assumptions and Dependencies](#27-assumptions-and-dependencies)
  * [External Interface Requirements](#external-interface-requirements)
    * 3.1 [User Interfaces](#31-user-interfaces)
    * 3.2 [Hardware Interfaces](#32-hardware-interfaces)
    * 3.3 [Software Interfaces](#33-software-interfaces)
    * 3.4 [Communications Interfaces](#34-communications-interfaces)
  * [System Features](#system-features)
    * 4.1 [System Feature 1](#41-system-feature-1)
    * 4.2 [System Feature 2 (and so on)](#42-system-feature-2-and-so-on)
  * [Other Nonfunctional Requirements](#other-nonfunctional-requirements)
    * 5.1 [Performance Requirements](#51-performance-requirements)
    * 5.2 [Safety Requirements](#52-safety-requirements)
    * 5.3 [Security Requirements](#53-security-requirements)
    * 5.4 [Software Quality Attributes](#54-software-quality-attributes)
    * 5.5 [Business Rules](#55-business-rules)
  * [Other Requirements](#other-requirements)
* [Appendix A: Glossary](#appendix-a-glossary)
* [Appendix B: Analysis Models](#appendix-b-analysis-models)
* [Appendix C: To Be Determined List](#appendix-c-to-be-determined-list)




## Revision History
| Name | Date    | Reason For Changes  | Version   |
| ---- | ------- | ------------------- | --------- |
|      |         |                     |           |
|      |         |                     |           |
|      |         |                     |           |

## 1. Introduction
### 1.1 Purpose 
O aplicație web care să gestioneze obiecte preferate sau detestate de un grup de persoane. Aceste obiecte vor fi magazine locale, deoarece acestea pot avea review urile 'boostate'. Voi lua în considerare caracteristicile importante ale acestor obiecte, cum ar fi categoria, contextul de utilizare și prețul, și voi preciza cel puțin o trăsătură dezirabilă sau indezirabilă, împreună cu justificarea opiniei.

Sistemul creat va genera inventare și statistici diverse, care pot fi exportate în formate deschise, cum ar fi CSV, DocBook și PDF. De asemenea, voi crea un clasament al celor mai detestate/dezirabile entități, care va fi disponibil și ca flux de date RSS. Voi expune functionalitatile esentiale si prin intermediul unui API Web REST/GraphQL.

Această aplicație va ajuta utilizatorii să își organizeze și să își gestioneze obiectele și artefactele preferate sau detestate, iar statisticile și clasamentele vor oferi o perspectivă mai largă asupra preferințelor și opiniilor utilizatorilor. În final, sper să creez o aplicație web utilă și ușor de utilizat pentru orice persoană interesată să își organizeze obiectele și artefactele digitale.

### 1.2 Document Conventions
Describe any standards or typographical conventions that were followed when writing this SRS, such as fonts or highlighting that have special significance. For example, state whether priorities  for higher-level requirements are assumed to be inherited by detailed requirements, or whether every requirement statement is to have its own priority.
### 1.3 Intended Audience and Reading Suggestions
Publicul tinta va avea orice categorie de varsta al carui review poate fi considerat 'relevant'. Acestea vor posta un review care va fi procesat de un administrator.
### 1.4 Product Scope
Acest produs va avea ca scop incercarea de prevenire a 'tepelor' cotidiene, confruntarea cu anumiti detinatori de magazin si alte probleme zilnice.
### 1.5 References
List any other documents or Web addresses to which this SRS refers. These may include user interface style guides, contracts, standards, system requirements specifications, use case documents, or a vision and scope document. Provide enough information so that the reader could access a copy of each reference, including title, author, version number, date, and source or location.

## Overall Description
### 2.1 Product Perspective
Perspectiva website-ului ar fi de a oferi utilizatorilor o platformă online unde aceștia să își poată organiza și gestiona obiectele detestate, în funcție de nevoile și preferințele lor. Website-ul ar oferi o interfață prietenoasă și ușor de utilizat, care să permită utilizatorilor să adauge si sa editeze review urile lor. De asemenea, website-ul ar genera inventare și statistici diverse, care să ofere o perspectivă mai largă asupra preferințelor și opiniilor utilizatorilor.

Perspectiva website-ului ar fi, de asemenea, de a fi scalabil și de a permite utilizatorilor să își împărtășească preferințele și opiniile cu alți utilizatori, prin intermediul clasamentelor și fluxurilor de date RSS. De asemenea, website-ul ar trebui să fie sigur și să protejeze informațiile personale ale utilizatorilor, prin intermediul măsurilor de securitate adecvate și actualizate.
### 2.3 User Classes and Characteristics
Vârsta: pot fi tineri sau bătrâni;
Experiența în utilizarea tehnologiei: pot fi utilizatori avansați sau începători;
Preferințe și opțiuni: pot avea preferințe și opțiuni variate în ceea ce privește obiectele și artefactele preferate sau detestate;
Necesități speciale: pot avea nevoi speciale, cum ar fi accesibilitatea pentru persoanele cu dizabilități.
### 2.4 Operating Environment
Server web: aplicația web trebuie să ruleze pe un server web care să ofere servicii de rețea necesare pentru a face aplicația disponibilă pentru utilizatorii din întreaga lume. Exemple de servere web includ Apache, Nginx sau IIS.

Limbaj de programare: aplicația web poate fi dezvoltată folosind diferite limbaje de programare, cum ar fi JavaScript, Python, Ruby, PHP și altele. Limbajul de programare folosit depinde de cerințele aplicației și preferințele dezvoltatorilor.

Bază de date: aplicația web poate necesita o bază de date pentru a stoca și accesa informațiile necesare. Exemple de baze de date includ MySQL, PostgreSQL sau MongoDB.

Biblioteci și framework-uri: dezvoltatorii pot folosi biblioteci și framework-uri pentru a simplifica procesul de dezvoltare a aplicației web. Exemple de biblioteci și framework-uri includ React, Angular, Django sau Ruby on Rails.

Alte componente software: aplicația web poate folosi și alte componente software pentru a îndeplini anumite funcții, cum ar fi librării de criptare sau de procesare de imagine.
### 2.5 Design and Implementation Constraints
Describe any items or issues that will limit the options available to the developers. These might include: corporate or regulatory policies; hardware limitations (timing requirements, memory requirements); interfaces to other applications; specific technologies, tools, and databases to be used; parallel operations; language requirements; communications protocols; security considerations; design conventions or programming standards (for example, if the customer’s organization will be responsible for maintaining the delivered software).
### 2.6 User Documentation
List the user documentation components (such as user manuals, on-line help, and tutorials) that will be delivered along with the software. Identify any known user documentation delivery formats or standards.
### 2.7 Assumptions and Dependencies
List any assumed factors (as opposed to known facts) that could affect the requirements stated in the SRS. These could include third-party or commercial components that you plan to use, issues around the development or operating environment, or constraints. The project could be affected if these assumptions are incorrect, are not shared, or change. Also identify any dependencies the project has on external factors, such as software components that you intend to reuse from another project, unless they are already documented elsewhere (for example, in the vision and scope document or the project plan).
## External Interface Requirements
### 3.1 User Interfaces
Describe the logical characteristics of each interface between the software product and the users. This may include sample screen images, any GUI standards or product family style guides that are to be followed, screen layout constraints, standard buttons and functions (e.g., help) that will appear on every screen, keyboard shortcuts, error message display standards, and so on. Define the software components for which a user interface is needed. Details of the user interface design should be documented in a separate user interface specification.
### 3.2 Hardware Interfaces
Describe the logical and physical characteristics of each interface between the software product and the hardware components of the system. This may include the supported device types, the nature of the data and control interactions between the software and the hardware, and communication protocols to be used.
### 3.3 Software Interfaces
Describe the connections between this product and other specific software components (name and version), including databases, operating systems, tools, libraries, and integrated commercial components. Identify the data items or messages coming into the system and going out and describe the purpose of each. Describe the services needed and the nature of communications. Refer to documents that describe detailed application programming interface protocols. Identify data that will be shared across software components. If the data sharing mechanism must be implemented in a specific way (for example, use of a global data area in a multitasking operating system), specify this as an implementation constraint.
### 3.4 Communications Interfaces
Describe the requirements associated with any communications functions required by this product, including e-mail, web browser, network server communications protocols, electronic forms, and so on. Define any pertinent message formatting. Identify any communication standards that will be used, such as FTP or HTTP. Specify any communication security or encryption issues, data transfer rates, and synchronization mechanisms.
## System Features
This template illustrates organizing the functional requirements for the product by system features, the major services provided by the product. You may prefer to organize this section by use case, mode of operation, user class, object class, functional hierarchy, or combinations of these, whatever makes the most logical sense for your product.
### 4.1 System Feature 1
Don’t really say “System Feature 1.” State the feature name in just a few words.
4.1.1   Description and Priority
 Provide a short description of the feature and indicate whether it is of High, Medium, or Low priority. You could also include specific priority component ratings, such as benefit, penalty, cost, and risk (each rated on a relative scale from a low of 1 to a high of 9).
4.1.2   Stimulus/Response Sequences
 List the sequences of user actions and system responses that stimulate the behavior defined for this feature. These will correspond to the dialog elements associated with use cases.
4.1.3   Functional Requirements
 Itemize the detailed functional requirements associated with this feature. These are the software capabilities that must be present in order for the user to carry out the services provided by the feature, or to execute the use case. Include how the product should respond to anticipated error conditions or invalid inputs. Requirements should be concise, complete, unambiguous, verifiable, and necessary. Use “TBD” as a placeholder to indicate when necessary information is not yet available.
 
 Each requirement should be uniquely identified with a sequence number or a meaningful tag of some kind.

### 4.2 System Feature 2 (and so on)

## Other Nonfunctional Requirements
### 5.1 Performance Requirements
If there are performance requirements for the product under various circumstances, state them here and explain their rationale, to help the developers understand the intent and make suitable design choices. Specify the timing relationships for real time systems. Make such requirements as specific as possible. You may need to state performance requirements for individual functional requirements or features.
### 5.2 Safety Requirements
Specify those requirements that are concerned with possible loss, damage, or harm that could result from the use of the product. Define any safeguards or actions that must be taken, as well as actions that must be prevented. Refer to any external policies or regulations that state safety issues that affect the product’s design or use. Define any safety certifications that must be satisfied.
### 5.3 Security Requirements
Specify any requirements regarding security or privacy issues surrounding use of the product or protection of the data used or created by the product. Define any user identity authentication requirements. Refer to any external policies or regulations containing security issues that affect the product. Define any security or privacy certifications that must be satisfied.
### 5.4 Software Quality Attributes
Specify any additional quality characteristics for the product that will be important to either the customers or the developers. Some to consider are: adaptability, availability, correctness, flexibility, interoperability, maintainability, portability, reliability, reusability, robustness, testability, and usability. Write these to be specific, quantitative, and verifiable when possible. At the least, clarify the relative preferences for various attributes, such as ease of use over ease of learning.
### 5.5 Business Rules
List any operating principles about the product, such as which individuals or roles can perform which functions under specific circumstances. These are not functional requirements in themselves, but they may imply certain functional requirements to enforce the rules.

## Other Requirements
Define any other requirements not covered elsewhere in the SRS. This might include database requirements, internationalization requirements, legal requirements, reuse objectives for the project, and so on. Add any new sections that are pertinent to the project.
### Appendix A: Glossary
Define all the terms necessary to properly interpret the SRS, including acronyms and abbreviations. You may wish to build a separate glossary that spans multiple projects or the entire organization, and just include terms specific to a single project in each SRS.
### Appendix B: Analysis Models
Optionally, include any pertinent analysis models, such as data flow diagrams, class diagrams, state-transition diagrams, or entity-relationship diagrams.
### Appendix C: To Be Determined List
Collect a numbered list of the TBD (to be determined) references that remain in the SRS so they can be tracked to closure.